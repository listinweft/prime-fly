<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;  // Corrected import for Password validation rule
use Illuminate\Validation\ValidationException;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Validator;  // Added this line to fix the Validator import
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessAddress;
        

class AuthController extends Controller
{
    public function registerpublic(Request $request)
{
    // Validate incoming request
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|min:2|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,NULL,id,deleted_at,NULL',
        'phone' => 'required|string|unique:users,phone,NULL,id',
        'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        'password_confirmation' => 'required_if:password,!=,null|same:password',
    ]);

    // If validation fails, return an error response
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error', 
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
        ], 422); // Unprocessable Entity
    }

    try {
        // Create the new user
        $user = new User();
        $user->user_type = 'Customer';
        $user->username = $request->email;
        $user->email = $request->email;
        $user->status = 'Inactive';
        $user->pay_status = 'Inactive';
        $user->phone = $request->phone;
        $user->btype = 'public';
        $user->password = Hash::make($request->password);

        if (!$user->save()) {
            throw new \Exception('Failed to create user.');
        }

        // Create the associated customer record
        $customer = new Customer();
        $customer->first_name = $request['firstname'];
        $customer->last_name = " ";
        $customer->user_id = $user->id;

        if (!$customer->save()) {
            throw new \Exception('Failed to create customer.');
        }

        // Generate token for mobile API access
        $token = $user->createToken('primefly')->plainTextToken;

        // Send credentials email
        $fullName = $customer->first_name . ' ' . $customer->last_name;
        if (Helper::sendCredentials($user, $fullName, $request->password)) {
            return response()->json([
                'status' => 'success-reload',
                'message' => 'Registration completed successfully. Credentials have been sent to your registered email.',
                'redirect' => '/login',
                'token' => $token, // Return the generated token for the mobile app
            ]);
        }

        // In case sending credentials fails
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send credentials.',
        ]);
    } catch (\Exception $e) {
        // Handle exception and return error message
        return response()->json([
            'status' => 'error',
            'message' => 'Registration failed: ' . $e->getMessage()
        ], 500); // Internal Server Error
    }
}
public function registercorporate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'companyname' => 'required|string|min:2|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,NULL,id,deleted_at,NULL',
        'phone' => 'required|string|unique:users,phone,NULL,id',
        'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    try {
        // Create user
        $user = new User();
        $user->user_type = 'Customer';
        $user->username = $request->email;
        $user->email = $request->email;
        $user->status = 'Inactive';
        $user->pay_status = 'Inactive';
        $user->phone = $request->phone;
        $user->btype = 'b2b';
        $user->password = Hash::make($request->password);

        if (!$user->save()) {
            throw new \Exception('Failed to create user.');
        }

        // Create customer
        $customer = new Customer();
        $customer->first_name = $request->companyname;
        $customer->last_name = " ";
      
        $customer->address = $request->address;
        $customer->country = $request->state;
        $customer->description = $request->message ?? "";
        $customer->user_id = $user->id;

        if (!$customer->save()) {
            throw new \Exception('Failed to create customer.');
        }

        // Create business address
        $businessAddress = new BusinessAddress();
        $businessAddress->address = $request->address;
        $businessAddress->customer_id = $customer->id;
        $businessAddress->country = "India";
        $businessAddress->state = $request->state;
        $businessAddress->city = $request->city;
        $businessAddress->pincode = $request->pincode;
        $businessAddress->gst_number = $request->gst_number;

        if (!$businessAddress->save()) {
            throw new \Exception('Failed to create business address.');
        }

        // Send credentials
        if (Helper::sendCredentials($user, $customer->first_name, $request->password)) {
            return response()->json([
                'status' => 'success',
                'message' => 'B2B request form submitted successfully. Our team will review the details and contact you soon.',
            ], 200);
        }

        throw new \Exception('Failed to send credentials.');
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Registration failed: ' . $e->getMessage(),
        ], 500);
    }
}

public function getCartByCustomerId(Request $request)
{
  
    // Retrieve the customer based on customer_id (which is actually user_id)
    $customer = Customer::where('user_id', $request->user_id)->first();



    
    // Check if customer exists
    if (!$customer) {
        return response()->json([
            'status' => 'error',
            'message' => 'Customer not found.',
        ], 404);
    }
    $customerId = $customer->id;
    // Set session key based on the customer ID
    $newSessionKey = $customerId;
    session(['session_key' => $newSessionKey]);

    // Retrieve cart items for the customer
    $cartItems = Cart::session($newSessionKey)->getContent();

    // Format cart data
    $cartData = $cartItems->map(function ($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => $item->quantity,
            'attributes' => $item->attributes,
            'conditions' => $item->conditions,
            'total' => $item->getPriceSum(),
        ];
    });

    // Return response
    return response()->json([
        'status' => 'success',
        'message' => 'Cart details retrieved successfully.',
        'cart_items' => $cartData,
        'cart_total' => Cart::session($newSessionKey)->getTotal(),
    ]);
}

/**
 * Preserve cart items between sessions.
 */
private function preserveCartItems($oldSessionKey, $newSessionKey)
{
    // Retrieve the cart items from the old session
    $cartItems = Cart::session($oldSessionKey)->getContent();

    // Add cart items to the new session
    foreach ($cartItems as $item) {
        Cart::session($newSessionKey)->add([
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => $item->quantity,
            'attributes' => $item->attributes,
            'conditions' => $item->conditions,
        ]);
    }

    // Clear the old session if needed
    // Cart::session($oldSessionKey)->clear();
}

// Login for public users with Sanctum authentication
public function login_public(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required',
    ]);

    $field = is_numeric($request->username) ? 'phone' : 'email';
    $user = User::where($field, $request->username)->first();

    if ($user && Hash::check($request->password, $user->password) && $user->user_type == 'Customer') {
        if ($user->btype == "public") {
            $customer = $user->customer;

            if ($customer) {
               
                 $token = $user->createToken('primefly')->plainTextToken;

                return response()->json([
                    'status' => 'success-reload',
                    'message' => 'Successfully logged in',
                    'token' => $token,
                    'user_id'=>$user->id
                   
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Customer not found.',
                ], 404);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',   
            ], 401);
        }
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }
}
 
public function login_corporate(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required',
    ]);


   
    $field = is_numeric($request->username) ? 'phone' : 'email';
    $user = User::where($field, $request->username)->first();

    if ($user && Hash::check($request->password, $user->password) && $user->user_type == 'Customer') {
        if ($user->btype == "b2b") {
            $customer = $user->customer;

            if ($customer) {
               
                 $token = $user->createToken('primefly')->plainTextToken;

                return response()->json([
                    'status' => 'success-reload',
                    'message' => 'Successfully logged in',
                    'token' => $token,
                    'user_id'=>$user->id
                   
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Customer not found.',
                ], 404);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',   
            ], 401);
        }
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }
}
public function forgot_password(Request $request)
{
    $user = User::where('email', $request->email)
        ->where('user_type', 'Customer')
        ->first();

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => "Email '" . $request->email . "' doesn't match with our records"
        ]);
    }

    $token = Str::random(64);

    // Use a transaction to handle the DB operations
    DB::transaction(function () use ($request, $token, $user) {
        PasswordReset::insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        $link = url('reset-password/' . $token);
        $name = $user->customer->first_name;

        // Send the password reset email
        Helper::forgotPassword($user, $name, $link);
    });

    // Return a successful response
    return response()->json([
        'status' => 'success',
        'message' => 'We have e-mailed your password reset link! Please check your email'
    ]);
}


public function logout(Request $request)
{
    // Validate that 'user_id' is provided and exists
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
    ]);

    // Retrieve the user by ID
    $user = User::find($request->user_id);

    if ($user) {
        // Revoke all tokens for the specified user
        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out.',
        ]);
    } else {
        // If user not found, return an error
        return response()->json([
            'status' => 'error',
            'message' => 'User not found.',
        ], 404);
    }
}


}


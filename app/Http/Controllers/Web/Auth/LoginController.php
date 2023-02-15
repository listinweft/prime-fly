<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Customer;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function __construct()
    {
        return Helper::commonData();
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        // set remember me cookie if the user check the box
        $remember = ($request->has('remember')) ? true : false;

        if (is_numeric($request->username)) {
            $field = 'phone';
        }
//        elseif (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
//            $field = 'email';
//        }
        else {
            $field = 'email';
//            $field = 'username';
        }
        if (Auth::guard('customer')->attempt([$field => $request->username, 'password' => $request->password, 'user_type' => 'Customer'], $remember)) {
            if (Auth::guard('customer')->user()->status == 'Inactive') {
                Auth::guard('customer')->logout();
                return response()->json(['status' => 'error', 'message' => 'Account is inactive, Please contact your site owner']);
            } else {
                $sessionKey = Auth::guard('customer')->user()->customer->id;
                session(['session_key' => $sessionKey]);
                Helper::transferGuestCartToUser($sessionKey);
                return response()->json(['status' => 'success-reload', 'message' => 'Successfully logged in']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Session::flush();
        return redirect('/')->with('status', 'User has been logged out!');
    }


    public function forgot_password(Request $request)
    {
      $user = User::where('email', $request->email)->where('user_type', 'Customer')->first();
      
        if ($user) {
            $token = Str::random(64);
            DB::beginTransaction();
            $password_reset = PasswordReset::insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);
            if ($password_reset) {
                $link = url('reset-password/' . $token);
                $name = $user->customer->first_name ;
                if (Helper::forgotPassword($user, $name, $link)) {
                    DB::commit();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'We have e-mailed your password reset link! Please check your email'
                    ]);
                } else {
                    DB::rollBack();
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Some error occurred while sending email, Please try after some time..!'
                    ]);
                }
            } else {
                DB::rollBack();
                return response()->json([
                    'status' => 'error',
                    'message' => "Some error occurred, Please try after some time..!"
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => "Email '" . $request->email . "' doesn't match with our records"
            ]);
        }
    }

    public function reset_password($token)
    {
        info($token);
        $title = 'Reset Password';
        $password_reset = PasswordReset::where('token', $token)->first();
        if ($password_reset) {
            if ((now()->diffInMinutes($password_reset->created_at)) > 15) {
                $link_expired = 'true';
            } else {
                $link_expired = 'false';
            }
            return view('web.reset_password', compact('title', 'token', 'link_expired'));
        } else {
            return view('web.reset_password', ['status' => 'invalid', 'title' => $title, 'message' => 'Invalid token!']);
        }
    }

    public function reset_password_store(Request $request, $token)
    {
        $password_reset = PasswordReset::where('token', $request->token)->first();
        if ($password_reset) {
            $request->validate([
                'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
                'password_confirmation' => 'required_if:password,!=,null|same:password',
            ]);

            $user = User::where('email', $password_reset->email)->first();
            if ($user) {
                $reset_password = $user->update([
                    'password' => Hash::make($request->password),
                ]);
                if ($reset_password) {
                    PasswordReset::where(['email' => $password_reset->email])->delete();
                    $name = $user->customer->first_name . ' ' . $user->customer->last_name;
                    Helper::sendCredentials($user, $name, $request->password);
                    return response()->json([
                        'status' => 'success-reload',
                        'message' => 'Password has been reset successfully, Please sign-in using your new password',
                        'redirect' => url('/')
                    ]);
                } else {
                    return response()->json(['status' => 'error', 'message' => "Some error occurred, Please try after some time..!"]);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => "Invalid Email"]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid token!']);
        }
    }
    public function register_form(Request $request)
    {
        return view('web.register');

    }
    public function login_form(Request $request)
    {
        return view('web.login');

    }
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|min:2|max:255',
             'lastname' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
//            'username' => 'required|string|max:255|unique:users,username',
            'phone' => 'required|min:7|max:15|unique:users,phone',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required_if:password,!=,null|same:password',
        ]);
        DB::beginTransaction();
        $user = new User();
        $user->user_type = 'Customer';
        $user->username  = $request->email;
        $user->email = $request->email;
//        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            $customer = new Customer;
             $customer->first_name  = $request['firstname'];
             $customer->last_name = $request['lastname'];
            $customer->user_id = $user->id;
            if ($customer->save()) {
                DB::commit();
                Auth::guard('customer')->login($user);
                if (Helper::sendCredentials($user, $customer->first_name. ' ' . ucfirst($customer->last_name), $request->password)) {
                    return response()->json([
                        'status' => 'success-reload',
                        'message' => 'Registration has been completed successfully, credentials has been sent to your registered mail id',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'success-reload',
                        'message' => "Registration has been done successfully,Can't send the credentials mail right now",
                    ]);
                }
            } else {
                DB::rollBack();
                return response()->json(['status' => 'error', 'message' => 'Error occurred while registration']);
            }
        } else {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'Error : Error occurred while registration']);
        }
    }


    /************************ Google auth starts ************************/

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            if ($googleUser) {
                $user = User::where('email', $googleUser->email)->first();
                if ($user) {
                    $user->update([
                        'google_token' => $googleUser->token,
                        'google_refresh_token' => $googleUser->refreshToken,
                    ]);
                    Auth::guard('customer')->login($user);
                } else {
                    DB::beginTransaction();
                    $user = new User();
                    $user->user_type = 'Customer';
                    $user->email = $googleUser->email;
//                    $user->username = $googleUser->email;
                    $user->password = Hash::make('dummyPass');
                    $user->phone = NULL;
                    $user->google_id = $googleUser->id;
                    $user->google_token = $googleUser->token;
                    $user->google_refresh_token = $googleUser->refreshToken;
                    if ($user->save()) {
                        $customer = new Customer;
                        $customer->first_name = $googleUser->name;
                        $customer->last_name = '';
                        $customer->user_id = $user->id;
                        if ($customer->save()) {
                            DB::commit();
                            Auth::guard('customer')->login($user);
                        } else {
                            DB::rollBack();
                            return redirect('/')->with('status', 'Some error occurred');
                        }
                    }
                }
                return redirect('/');
            } else {
                return redirect('/')->with('status', 'Some error occurred');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /************************ Facebook auth starts ************************/

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            if ($facebookUser) {
                $user = User::where('email', $facebookUser->email)->first();
                if ($user) {
                    $user->update([
                        'facebook_token' => $facebookUser->token,
                        'facebook_refresh_token' => $facebookUser->refreshToken,
                    ]);
                    Auth::guard('customer')->login($user);
                } else {
                    DB::beginTransaction();
                    $user = new User();
                    $user->user_type = 'Customer';
                    $user->email = $facebookUser->email;
//                    $user->username = $facebookUser->email;
                    $user->password = Hash::make('dummyPass');
                    $user->phone = NULL;
                    $user->facebook_id = $facebookUser->id;
                    $user->facebook_token = $facebookUser->token;
                    $user->facebook_refresh_token = $facebookUser->refreshToken;
                    if ($user->save()) {
                        $customer = new Customer;
                        $customer->first_name = $facebookUser->name;
                        $customer->last_name = '';
                        $customer->user_id = $user->id;
                        if ($customer->save()) {
                            DB::commit();
                            Auth::guard('customer')->login($user);
                        } else {
                            DB::rollBack();
                            return redirect('/')->with('status', 'Some error occurred');
                        }
                    }
                }
                return redirect('/');
            } else {
                return redirect('/')->with('status', 'Some error occurred');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Web;
use DateTime;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Advertisement;
use App\Models\Banner;
use App\Models\Country;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CustomerAddress;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderCoupon;
use App\Models\OrderCustomer;
use App\Models\OrderLog;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\SeoData;
use App\Models\ShippingCharge;
use App\Models\SiteInformation;
use App\Models\PersonalDetails;
use App\Models\State;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Termwind\Components\Dd;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function __construct()
    {
        return Helper::commonData();
    }

    public function add_to_wish_list(Request $request)
    {
       
        if (Auth::guard('customer')->check()) {
            $wish_list = app('wishlist');
            $sessionKey = Auth::guard('customer')->user()->customer->id;
            $product = Product::find($request->product_id);
            if ($wish_list->get($product->id)) {
                $wish_list->remove($product->id);
                $message = "Item removed from wishlist";
                $responseStatus = true;
            } else {
                $cartItem = Cart::session($sessionKey)->getContent()->where('attributes.product_id', $product->id)->where('attributes.size', $request->size);
                $cartItem = Cart::session($sessionKey)->getContent()
                ->where('attributes.product_id', $product->id)
                ->where('attributes.size', $product->size);
                if($product->frame != null){
                    $cartItem = $cartItem->where('attributes.frame', $product->frame);
                }
                if($product->mount != null){
                    $cartItem = $cartItem ->where('attributes.mount', $product->mount);
                }

                $cartItem = $cartItem->first();
                if($request->cart_id != null){

                    if (Cart::session($sessionKey)->get($request->cart_id)) {
                        Cart::session($sessionKey)->remove($request->cart_id);
                    }
                }
                if ($cartItem) {
                    if (Cart::session($sessionKey)->get($cartItem->id)) {
                        Cart::session($sessionKey)->remove($cartItem->id);
                    }
                }
                $item = $wish_list->add(array(
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' =>  $product->price,
                    'quantity' => 1,
                  
                    'attributes' => array(
                        'size' => $request->size,
                        'type_id' => $request->type_id,
                    ),
                ),
            );
                $message = "Item added to wishlist";
                $responseStatus = false;
            }
            $wishListItem = $wish_list->getContent();
            return response(array(
                'status' => true,
                'data' => $wishListItem,
                'responseStatus' => $responseStatus,
                'message' => $message,
                'count' => $wish_list->getContent()->count(),
                'cartCount' => Cart::session($sessionKey)->getContent()->count(),
            ), 200, []);
        } else {
            abort(403, 'You are not authorised');
        }
    }

    public function add_to_cart(Request $request)
    {
        // Log the incoming request data for debugging purposes
        \Log::info($request->all());
    
        // Initialize the session
        $sessionKey = $this->setSession();
        $addStatus = true;
    
        // Handle multiple product IDs
        if (strpos($request->product_id, ',')) {
            $productIds = explode(',', $request->product_id);
            foreach ($productIds as $product) {
                $addStatus = $this->cartAddItems($request, $product, $sessionKey, $request->totalprice, $request->totalguest, $request->setdate, $request->origin, $request->destination, $request->travel_sector, $request->flight_number, $request->entry_date, $request->travel_type,$request->terminal,$request->bag_count,$request->exit_time,$request->entry_time,$request->adults,$request->infants,$request->children,$request->pnr,$request->meet_guest);
                if (!$addStatus) {
                    break; // If adding any product fails, stop the loop
                }
            }
        } else {
            $addStatus = $this->cartAddItems($request, $request->product_id, $sessionKey, $request->totalprice, $request->totalguest, $request->setdate, $request->origin, $request->destination, $request->travel_sector, $request->flight_number, $request->entry_date, $request->travel_type,$request->terminal,$request->bag_count,$request->exit_time,$request->entry_time,$request->adults,$request->infants,$request->children,$request->pnr,$request->meet_guest);
        }
    
        $count = 0;
        foreach (Cart::session($sessionKey)->getContent() as $row) {
            $count += $row->quantity;
        }
    
        if ($addStatus) {
            $message = "Item added to cart successfully";
            $cartItem = Cart::session($sessionKey)->getContent();
            return response()->json([
                'status' => true,
                'data' => $cartItem,
                'message' => $message,
                'count' => $count,
                'cartTotal' => number_format(Cart::session($sessionKey)->getSubTotal(), 2)
            ]);
        } else {
            $message = "Item seems to be low stock..!";
            return response()->json([
                'status' => false,
                'message' => $message,
                'count' => $count,
                'cartTotal' => number_format(Cart::session($sessionKey)->getSubTotal(), 2)
            ]);
        }
    }
    

    public function checkCart()
{
    // Get the cart session key
    $sessionKey = $this->setSession(); // Adjust this if needed
    
    // Fetch cart content
    $cartItems = Cart::session($sessionKey)->getContent();
    
    // Log or inspect the cart items
    \Log::info('Cart Items:', $cartItems->toArray());

    // Return data to view or as a JSON response

}
    public function cartAddItems($request, $product_id, $sessionKey, $totalprice, $totalguest, $setdate, $origin, $destination, $travel_sector, $flight_number, $entry_date, $travel_type, $terminal, $bag_count, $exit_time, $entry_time, $adults, $infants, $children,$pnr,$meet_guest)
    {
        $origin = $origin ?? '';
        $destination = $destination ?? '';
        $travel_sector = $travel_sector ?? '';
        $flight_number = $flight_number ?? '';
        $entry_date = $entry_date ?? '';
        $travel_type = $travel_type ?? '';
        $bag_count = $bag_count ?? '';
        $adults = $adults ?? '';
        $infants = $infants ?? '';
        $children  = $children ?? '';
        $entry_time = $entry_time ?? '';
        $pnr  = $pnr ?? '';
        $exit_time = $exit_time ?? '';
        $meet_guest  = $meet_guest  ?? '';
    
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }
    
        $qty = ($request->qty) ? $request->qty : 1;
    
        $offer_amount = '0.00';
        $offer_id = '0';
        $product_price = $totalprice;
    
        $attrText = '';
        if ($request->attributeList != NULL) {
            $attributeArray = is_array($request->attributeList) ? $request->attributeList : explode(',', $request->attributeList);
            foreach ($attributeArray as $attr) {
                $attrText .= "<span>" . $attr . "</span><br/>";
            }
        }
    
        try {
            // Generate a more robust unique cart item ID
            $uniqueId = $product->id . '_' . time() . '_' . Str::random(8);
    
            // Add the product to the cart session
            Cart::session($sessionKey)->add([
                'id' => $uniqueId,
                'name' => $product->title,
                'price' => $totalprice,
                'quantity' => $qty,
                'guest' => $totalguest,
                'attributes' => [
                    'guest' => $totalguest,
                    'entry_date' => $entry_date,
                    'travel_type' => $travel_type,
                    'setdate' => $setdate,
                    'origin' => $origin,
                    'destination' => $destination,
                    'travel_sector' => $travel_sector,
                    'flight_number' => $flight_number,
                    'terminal' => $terminal,
                    'entry_time' => $entry_time,
                    'exit_time' => $exit_time,
                    'bag_count' => $bag_count,
                    'adults' => $adults,
                    'infants' => $infants,
                    'children' => $children,
                    'porter_count' => $totalguest,
                    'pnr' => $pnr,
                    'meet_guest' => $meet_guest
                    

                ],
                'conditions' => [],
            ]);
    
            // Remove the product from the wishlist if it exists
            $wish_list = app('wishlist');
            if ($wish_list->get($product->id)) {
                $wish_list->remove($product->id);
            }
    
            return response()->json(['status' => true, 'message' => 'Product added to cart']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    
    
    
    
    public function cart()
    {

       
        $sessionKey = session('session_key');


    //    return Cart::session($sessionKey)->getContent();
        // $cartItems = Cart::session($sessionKey)->getContent();

        // foreach ($cartItems as $item) {
        //     echo "Product ID: " . $item->id . "<br>";
        //     echo "Product Name: " . $item->name . "<br>";
        //     echo "Price: " . $item->price . "<br>";
        //     echo "Quantity: " . $item->quantity . "<br>";
        //     echo "Guest: " . $item->guest . "<br>"; // Ensure 'guest' is correctly accessed
        //     echo "Attributes: " . json_encode($item->attributes) . "<br>";
        //     echo "Conditions: " . json_encode($item->conditions) . "<br>";
        //     echo "<br>";
        // }
        
        
         
       
        $calculation_box = Helper::calculationBox();
        
        $tag = $this->seo_content('Cart');
        $banner = Banner::type('cart')->first();
        $featuredProducts = Product::active()->featured()->get();
        $cartContents = $this->cartData();
        $categorys = Category::whereNull('parent_id')->get();

        $cartAdDetail = Advertisement::active()->type('cart')->latest()->get();
        return view('web.cart', compact('sessionKey', 'calculation_box', 'tag', 'cartAdDetail',
            'banner', 'featuredProducts','categorys'));
    }

    public function setSession()
    {
 
        if (Auth::guard('customer')->check()) {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (Cart::session($sessionKey)->isEmpty()) {
                    $sessionKey = Auth::guard('customer')->user()->customer->id;
                    session(['session_key' => $sessionKey]);
                }
            } else {
                $sessionKey = Auth::guard('customer')->user()->customer->id;
                session(['session_key' => $sessionKey]);
            }
        } else {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (Cart::session($sessionKey)->isEmpty()) {
                    $sessionKey = rand(1, 9999) . time();
                    session(['session_key' => $sessionKey]);
                }
            } else {
                $sessionKey = rand(1, 9999) . time();
                session(['session_key' => $sessionKey]);
            }
        }
        return $sessionKey;
    }

  
   
    
    


    public function open_cart_modal()
    {
        return view('web.modals.cart_modal');
    }

   
    public function seo_content($page)
    {
        $seo_data = SeoData::page($page)->first();
        return $seo_data;
    }

    public function cartData()
    {
        if (Session::has('session_key')) {
            $sessionKey = session('session_key');
            if (!Cart::session($sessionKey)->isEmpty()) {
                foreach (Cart::session($sessionKey)->getContent() as $row) {
                    $product = Product::where([['status', 'Active'], ['id', $row->id]])->first();
                    if ($product == NULL) {
                        if (Cart::session($sessionKey)->get($row->id)) {
                            Cart::session($sessionKey)->remove($row->id);
                        }
                    }
                }
            }
        }
    }

    public function update_item_quantity(Request $request)
    {
        if ($request->product_id) {
            if (Session::has('session_key')) {
                $product = Product::find($request->product_id);
                $item = Cart::session(session('session_key'))->get($request->product_id);
               $productCount=0;
      
                
                if ($request->qty > $product->stock) {
                    return response(array(
                        'status' => false,
                        'message' => 'Item seems to be low stock..!',
                        'qty' => $item->quantity,
                        
                    ), 200, []);
                } else {
                    Cart::session(session('session_key'))->update($request->product_id, [
                        'quantity' => array(
                            'relative' => false,
                            'value' => $request->qty
                        ),
                    ]);
                    $cartItem = Cart::session(session('session_key'))->getContent();
                    foreach ( $cartItem as $row) {
                        $productCount += $row->quantity;
                    }
                    return response(array(
                        'status' => true,
                        'data' => $cartItem,
                        'message' => 'Cart updated successfully',
                        'count' => $cartItem->count(),
                        'productCount' => $productCount,
                    ), 200, []);
                }
            }
        }
    }
    public function get_calc_value(Request $request){
        
      $product = Product::find($request->product_id);
     
      $price = 0;
      $productOffer = Offer::where('product_id',$product->id)->where('status','Active')->first();
      if (Helper::offerPrice($product->id) != '') {
                
        $offer_amount = Helper::offerPriceSize($product->id,$request->size,$productOffer->id);
        if($offer_amount != null){
          
            $price =$offer_amount;
        }
        else{
            // $price = $product->price;
            $cartPrice = Cart::session(session('session_key'))->get($request->id);
            $price = $cartPrice->price;
          }
     
    
    }
    else{
        $cartPrice = Cart::session(session('session_key'))->get($request->id);
        $price = $cartPrice->price;
    }
    //get cart price 

      
      $qty = number_format($request->qty,2);
        $total = ($price*$qty);

        
        $cart_session =  Cart::session(session('session_key'));
        $cart = number_format($cart_session->getTotal(), 2);
   
        $calculation_box = Helper::calculationBox();
        $default_currency = Helper::defaultCurrency();
        return response(array(
            'status' => true,
        'total' => number_format(   ($total),2),
           
            'tax_amount' =>  number_format($calculation_box['tax_amount'],2),
            'shipping_amount' => number_format($calculation_box['shippingAmount'],2),
            'cart_final_total' => number_format($calculation_box['final_total_with_tax'],2),
            'cart' => $cart,
            'default_currency' => $default_currency,
        ), 200, []);

    }
    public function remove_cart_item(Request $request)
    {
        if ($request->cart_id) {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (Cart::session($sessionKey)->get($request->cart_id)) {
                    Cart::session($sessionKey)->remove($request->cart_id);
                    $message = "Item removed from cart successfully";
                    $icon = "fa-times";
                    $type = "success";
                } else {
                    $message = "Item not found";
                    $icon = "fa fa-check";
                    $type = "success";
                }
                if (!Cart::session($sessionKey)->isEmpty()) {
                    $cartItem = Cart::session($sessionKey)->getContent();
                    $cartCount = $cartItem->count();
                } else {
                    session()->forget('session_key');
                    session()->forget('selected_shipping_address');
                    session()->forget('selected_customer_address');
                    session()->forget('order_remarks');
                    session()->forget('shipping_charge');
                    session()->forget('coupons');
                    session()->forget('coupon_value');
                    $cartCount = '0';
                }
                return response(array(
                    'status' => true,
                    'data' => [],
                    'message' => $message,
                    'count' => $cartCount,
                    'icon' => $icon,
                    'type' => $type
                ), 200, []);
            }
        }
    }

    public function wishlist()
    {
        if (Auth::guard('customer')->check()) {
            $sessionKey = session('session_key');
            $wish_list = app('wishlist');
            $tag = $this->seo_content('1', 'Wishlist');
            $cartContents = $this->wishlistData();
            return view('web.customer.wishlist', compact('sessionKey', 'wish_list', 'tag'));
        }
    }

    public function wishlistData()
    {
        $wish_list = app('wishlist');
        $sessionKey = Auth::guard('customer')->user()->customer->id;
        if (!$wish_list->getContent()->isEmpty()) {
            foreach ($wish_list->getContent() as $row) {
                $productData = Product::where([['status', '=', 'Active'], ['id', '=', $row->id]])->first();
                if ($productData == NULL) {
                    if ($wish_list->get($row->id)) {
                        $wish_list->remove($row->id);
                    }
                }
            }
        }
    }

    public function preview()
    {
   
        $sessionKey = session('session_key');


        
         
       
        $calculation_box = Helper::calculationBox();
        
        $tag = $this->seo_content('Cart');
        $banner = Banner::type('cart')->first();
        $featuredProducts = Product::active()->featured()->get();
        $cartContents = $this->cartData();
   
        $cartAdDetail = Advertisement::active()->type('cart')->latest()->get();
        return view('web.preview', compact('sessionKey', 'calculation_box', 'tag', 'cartAdDetail',
            'banner', 'featuredProducts'));
    }

    public function checkout()
    {
   
        $sessionKey = session('session_key');


        
         
       
        $calculation_box = Helper::calculationBox();
        
        $tag = $this->seo_content('Cart');
        $banner = Banner::type('cart')->first();
        $featuredProducts = Product::active()->featured()->get();
        $cartContents = $this->cartData();
   
        $cartAdDetail = Advertisement::active()->type('cart')->latest()->get();
        return view('web.checkout', compact('sessionKey', 'calculation_box', 'tag', 'cartAdDetail',
            'banner', 'featuredProducts'));
    }

    public function state_list(Request $request)
    {
        $shipping_charge = ShippingCharge::active()->pluck('state_id')->toArray();
        $statesData = State::active()->whereIn('id',$shipping_charge)->where('country_id', $request->country_id)->get(['id', 'title']);
        return response()->json(['status' => 'true', 'states' => $statesData]);
     
    }
    public function b_state_list(Request $request)
    {
        $statesData = State::active()->where('country_id', $request->country_id)->get(['id', 'title']);
        return response()->json(['status' => 'true', 'states' => $statesData]);
    }
    
    public function different_shipping_address(Request $request)
    {
        
        if (Auth::guard('customer')->check()) {
            if ($request->different_status == 'true') {
                if (Session::has('selected_billing_address')) {
                    Session::forget('selected_billing_address');
   
                }
                session(['different_shipping_address' => true]);
                return response(array('status' => true, 'message' => 'You can select new Billing Address','type'=>'different','reload'=>true));
            } else {
                session(['different_shipping_address' => false]);
                if (Session::has('selected_shipping_address')) {
                    session(['selected_billing_address' => Session::get('selected_shipping_address')]);
                    return response(array('status' => true, 'message' => 'Same address for Billing  Address selected Successfully','type'=>'same','reload'=>true));
                } else {
                    return response(array('status' => false, 'message' => 'Select Shipping Address First'));
                }
            }
        } else {
            if ($request->different_status == 'true') {
                
                session(['different_shipping_address' => true]);
                if (Session::has('billing_address')) {
                    session()->forget('billing_first_name');
                    session()->forget('billing_last_name');
                    session()->forget('billing_phone');
                    session()->forget('billing_email');
                    session()->forget('billing_address');
                    session()->forget('billing_address_label_type');
                    session()->forget('billing_zipcode');
                    session()->forget('billing_state');
                    session()->forget('billing_state_name');
                    session()->forget('billing_country');
                    session()->forget('billing_country_name');
                }
                $orderConfirm = Helper::checkConfirmOrder();
                $orderC = false;
                if($orderConfirm == "true"){
                    $orderC = true;
                }
                else{
                    $orderC = false;
                }
               
                return response(array('status' => true, 'message' => 'You can add new Blling Address','orderC' => $orderC, 'type'=>'different'));
            } else {
               
                session(['different_shipping_address' => false]);
                if (Session::has('shipping_address')) {
                  
                    session(['billing_first_name' => session('first_name')]);
                    session(['billing_last_name' => session('last_name')]);
                    session(['billing_phone' => session('phone')]);
                    session(['billing_country' => session('country')]);
                    session(['billing_state' => session('state')]);
                    session(['billing_email' => session('email')]);
                    session(['billing_address' => session('address')]);
                    session(['billing_zipcode' => session('zipcode')]);
                    session(['address_choose' => 'same']);

                    session(['shipping_first_name' => session('first_name')]);
                    session(['shipping_last_name' => session('last_name')]);
                    session(['shipping_phone' => session('phone')]);
                    session(['shipping_country' => session('country')]);
                    session(['shipping_state' => session('state')]);
                    session(['shipping_email' => session('email')]);
                    session(['shipping_address' => session('address')]);
                    session(['shipping_zipcode' => session('zipcode')]);
                    session(['address_choose' => 'same']);
                    $orderConfirm = Helper::checkConfirmOrder();
                    $orderC = false;
                    if($orderConfirm == "true"){
                        $orderC = true;
                    }
                    else{
                        $orderC = false;
                    }
                 
                    return response(array('status' => true, 'message' => 'Same address for Billing and Shipping Address added Successfully','orderC' => $orderC, 'type'=>'same'));
                } else {
                    $orderConfirm = Helper::checkConfirmOrder();
                    $orderC = false;
                    if($orderConfirm == "true"){
                        $orderC = true;
                    }
                    else{
                        $orderC = false;
                    }
                    return response(array('status' => false, 'message' => 'Add Shipping Address First','orderC' => $orderC, 'type'=>'same'));
                }
            }
        }
    }
    public function update_customer_shipping_address(Request $request)
    {
      
  
        if (Auth::guard('customer')->check()) {
           
            if ($request->id != '0') {
                $customer_address = CustomerAddress::find($request->id);
                $text = 'update';
            } else {
                $customer_address = new CustomerAddress;
        
                $text = 'add';
                $customer_address->customer_id = Auth::guard('customer')->user()->customer->id;
            }
            if($request->address){
               
                $request->validate([
                    'first_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                    'last_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                    'country' =>    'required',
                    'state' =>    'required',
                    'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
                    'email' => 'required|email|max:70',
                    'address' => 'required',
                    // 'zipcode' => 'regex:/^([0-9\+]*)$/|max:10',
                ]);
            }
            

            $checkInShipping = $message = '';
            $customer_address->first_name = $request->first_name;
            $customer_address->last_name = $request->last_name;
            $customer_address->phone = $request->phone;
            $customer_address->email = $request->email;
            $customer_address->address = $request->address;
            $customer_address->address_type = $request->address_label_type ?? 'Home';
            $customer_address->zipcode = $request->zipcode;
            $customer_address->state_id = $request->state;
            $customer_address->country_id = $request->country;
            $customer_address->is_default = 'Yes' ;
            // dd($customer_address);
            $checkInShipping = ShippingCharge::where('status','Active')->where('state_id' ,$request->state)->first();
            if($checkInShipping != ''){
                $orderC = true;
            }
            else{
                $orderC  = false;
            }
            if ($request->is_default) {
                $message = 'Address has been added successfully';
               
            }
            else{
                $customer_address->is_default = 'No';
            }
           

            if ($customer_address->save()) {
                if ($customer_address->is_default) {
                    $updateWhole = CustomerAddress::where([['customer_id', Auth::guard('customer')->user()->customer->id], ['id', '!=', $customer_address->id]])->update(['is_default' => 'No']);
                }
                if (isset($request->set_session) && $request->set_session == 1 ) {
                    session(['selected_customer_address' => $customer_address->id]);
                    session(['selected_shipping_address' => $customer_address->id]);
                    session(['selected_billing_address' => $customer_address->id]);
                }
                $calculation_box = Helper::calculationBox();
                
                echo json_encode(array('status' => 'true', 'message' => $message,'calculation_box'=>$calculation_box,'reload'=>"true",'orderC' => $orderC));
            } else {
                echo json_encode(array('status' => 'false', 'message' => "Error while " . $text . "ing the address, Please try after sometime"));
            }
        } else {
      
            $account_type = $request->account_type;
            if ($account_type == "0") {
               
   
                if($request->shipping_address && $request->shipping_state !=  null){
                    if($request->choose == 'same'){
                        
                        $request->validate([
                            'shipping_first_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                            'shipping_last_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                            'shipping_country' =>    'required',
                            'shipping_state' =>    'required',
                            'shipping_phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
                            'shipping_email' => 'required|email|max:70',
                            'shipping_address' => 'required',
                            // 'zipcode' => 'regex:/^([0-9\+]*)$/|max:10',
                        ],
                        [
                            'shipping_first_name.required' => 'The first name field is required.',
                            'shipping_last_name.required' => 'The last name field is required.',
                            'shipping_country.required' => 'The country field is required.',
                            'shipping_state.required' => 'The state field is required.',
                            'shipping_phone.required' => 'The phone field is required.',
                            'shipping_email.required' => 'The email field is required.',
                            'shipping_address.required' => 'The address field is required.',
                            'shipping_first_name.regex' => 'The first name may only contain letters and spaces.',
                            'shipping_last_name.regex' => 'The last name may only contain letters and spaces.',
                            'shipping_phone.regex' => 'The phone may only contain numbers and +.',
                            'shipping_first_name.min' => 'The first name must be at least 2 characters.',
                            'shipping_last_name.min' => 'The last name must be at least 2 characters.',
                            'shipping_phone.min' => 'The phone must be at least 7 characters.',
                            'shipping_first_name.max' => 'The first name may not be greater than 30 characters.',
                            'shipping_last_name.max' => 'The last name may not be greater than 30 characters.',
                            'shipping_phone.max' => 'The phone may not be greater than 20 characters.',
                            'shipping_email.email' => 'The email must be a valid email address',
                        ]);
                            session(['first_name' => $request->shipping_first_name]);
                            session(['last_name' => $request->shipping_last_name]);
                            session(['email' => $request->shipping_email]);
                            session(['phone' => $request->shipping_phone]);
                            session(['country' => $request->shipping_country]);
                            session(['state' => $request->shipping_state]);                  
                            session(['address' => $request->shipping_address]);
                            session(['zipcode' => $request->shipping_zipcode]);
                            session(['address_choose' => $request->choose]);

                            session(['billing_first_name' => session('first_name')]);
                            session(['billing_last_name' => session('last_name')]);
                            session(['billing_phone' => session('phone')]);
                            session(['billing_country' => session('country')]);
                            session(['billing_state' => session('state')]);
                            session(['billing_email' => session('email')]);
                            session(['billing_address' => session('address')]);
                            session(['billing_zipcode' => session('zipcode')]);
                            session(['address_choose' => 'same']);

                            session(['shipping_first_name' => session('first_name')]);
                            session(['shipping_last_name' => session('last_name')]);
                            session(['shipping_phone' => session('phone')]);
                            session(['shipping_country' => session('country')]);
                            session(['shipping_state' => session('state')]);
                            session(['shipping_email' => session('email')]);
                            session(['shipping_address' => session('address')]);
                            session(['shipping_zipcode' => session('zipcode')]);
                            session(['address_choose' => 'same']);
                           
                            
                    }
                    else{
                        session()->forget('billing_first_name');
                        session()->forget('billing_last_name');
                        session()->forget('billing_phone');
                        session()->forget('billing_country');
                        session()->forget('billing_email');
                        session()->forget('billing_address');
                        session()->forget('billing_zipcode');
                        session()->forget('address_choose');

                        session()->forget('shipping_first_name');
                        session()->forget('shipping_last_name');
                        session()->forget('shipping_phone');
                        session()->forget('shipping_state');
                        session()->forget('shipping_state');
                        session()->forget('shipping_address');
                        session()->forget('shipping_zipcode');
                        session()->forget('address_choose');

                        session(['first_name' => $request->shipping_first_name]);
                        session(['last_name' => $request->shipping_last_name]);
                        session(['email' => $request->shipping_email]);
                        session(['phone' => $request->shipping_phone]);
                        session(['country' => $request->shipping_country]);
                        session(['state' => $request->shipping_state]);                  
                        session(['address' => $request->shipping_address]);
                        session(['zipcode' => $request->shipping_zipcode]);
                        session(['address_choose' => $request->choose]);

                        session(['shipping_first_name' => session('first_name')]);
                        session(['shipping_last_name' => session('last_name')]);
                        session(['shipping_phone' => session('phone')]);
                        session(['shipping_country' => session('country')]);
                        session(['shipping_state' => session('state')]);
                        session(['shipping_email' => session('email')]);
                        session(['shipping_address' => session('address')]);
                        session(['shipping_zipcode' => session('zipcode')]);
                        session(['address_choose' => 'different']);
                    }
                    $orderConfirm = Helper::checkConfirmOrder();
                    $orderC = false;
                    if($orderConfirm == "true"){
                        $orderC = true;
                    }
                    else{
                        $orderC = false;
                    }
                 
                    $calculation_box = Helper::calculationBox();
                  $calculation_box['shippingAmount'] = number_format($calculation_box['shippingAmount'],2);
                  $calculation_box['tax_amount'] = number_format($calculation_box['tax_amount'],2);
                  $calculation_box['final_total_with_tax'] = number_format($calculation_box['final_total_with_tax'],2);
             

                    $default_currency = Helper::defaultCurrency();
                    echo json_encode(array('status' => 'true', 'message' => 'Address has been added successfully','calculation_box'=>$calculation_box , 'reload'=>$orderC, 'default_currency'=>$default_currency));
                }
            } else {
                abort(403, 'You are not authorised');
            }
        }
    }
    // public function check_address(Request $request){
     
    //    if($request->choose == "different"){
    //     session()->forget('billing_first_name');
    //     session()->forget('billing_last_name');
    //     session()->forget('billing_phone');
    //     session()->forget('billing_email');
    //     session()->forget('billing_address');
    //     session()->forget('billing_address_label_type');
    //     session()->forget('billing_zipcode');
    //     session()->forget('billing_state');
    //     session()->forget('billing_state_name');
    //     session()->forget('billing_country');
    //     session()->forget('billing_country_name');
    //    }
    // }
    public function billing_address_store(Request $request)
    {
  
        if($request->address){
               
            $request->validate([
                'first_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                'last_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                'country' =>    'required',
                // 'state' =>    'required',
                'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
                'email' => 'required|email|max:70',
                'address' => 'required',
                // 'zipcode' => 'regex:/^([0-9\+]*)$/|max:10',
            ]);
        }
        $message = '';
        if (Auth::guard('customer')->check()) {
            if ($request->id != '0') {
                $customerAddress = CustomerAddress::find($request->id);
                $text = 'updat';
            } else {
                $customerAddress = new CustomerAddress;
                $text = 'add';
                $customerAddress->customer_id = Auth::guard('customer')->user()->customer->id;
            }

            $customerAddress->customer_id = Auth::guard('customer')->user()->customer->id;
            $customerAddress->first_name = $request->first_name ?? '';
            $customerAddress->last_name = $request->last_name;
            $customerAddress->address = $request->address;
            $customerAddress->email = $request->email ?? '';
            $customerAddress->phone = $request->phone;
            $customerAddress->address_type = $request->address_label_type ?? 'Home';
            $customerAddress->state_id = $request->state ?? null;
            $customerAddress->country_id = $request->country;
           $customerAddress->zipcode = $request->zipcode ?? null ;
            $is_default = false;

            if ($customerAddress->save()) {
               
                if (isset($request->set_session) && $request->set_session == 1) {
                    session(['selected_customer_address' => $customerAddress->id]);
                      session(['selected_billing_address' => $customerAddress->id]);
                      session(['selected_customer_billing_address' => $customerAddress->id]);
                      
                }
                $calculation_box = Helper::calculationBox();
                echo json_encode(array('status' => 'true', 'message' => 'New billing address added successfully','calculation_box'=>$calculation_box,'reload'=>"true"));
            } else {
                echo json_encode(array('status' => 'false', 'message' => "Error while " . $text . "ing the address, Please try after sometime"));
            }
        } else {
           
            $account_type = $request->account_type;
            $request->validate([
                'first_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
                'last_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
              'country' =>    'required',
                'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
                'email' => 'required|email|max:70',
                'address' => 'required',
                // 'zipcode' => 'regex:/^([0-9\+]*)$/|max:10',
            ]);
           
            if ($account_type == "0") {
                if(@$request->address){
                    
                    session(['first_name' => $request->first_name]);
                    session(['last_name' => $request->last_name]);
                    session(['email' => $request->email]);
                    session(['phone' => $request->phone]);
                    session(['country' => $request->country]);
                    session(['state' => $request->state]);
                    session(['address' => $request->address]);
                    session(['zipcode' => $request->zipcode]);
                    session(['address_choose' => $request->choose]);
                session(['billing_first_name' => session('first_name')]);
                session(['billing_last_name' => session('last_name')]);
                session(['billing_phone' => session('phone')]);
                session(['billing_country' => session('country')]);
                session(['billing_state' => session('state')]);
                session(['billing_email' => session('email')]);
                session(['billing_address' => session('address')]);
                session(['billing_zipcode' => session('zipcode')]);
                session(['address_choose' => 'diffrent']);
                }
                echo json_encode(array('status' => 'true', 'message' => 'Billing has been added successfully', 'reload'=>"true"));
            } else {
                abort(403, 'You are not authorised');
            }
        }

    }
    public function select_customer_address(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (!Cart::session($sessionKey)->isEmpty()) {
                    $address = CustomerAddress::find($request->address_id);
                    $address->is_default = 'Yes';
                    $address->save();
                    if($address){
                        $updateWhole = CustomerAddress::where([['customer_id', Auth::guard('customer')->user()->customer->id], ['id', '!=', $address->id]])->update(['is_default' => 'No']);
                    }
                    $responseMessage = 'Customer address selected successfully';
                    $status = true;
                    if($address){
                        if($address->state){
                            $shipping = ShippingCharge::active()
                                ->where('state_id' ,$address->state->id)->first();
                            if($shipping != NULL){
                                session(['selected_customer_address' => $request->address_id]);
                                session(['selected_shipping_address' => $request->address_id]);
                                session(['selected_billing_address' => $request->address_id]);
                            }
                            else{
                                $status = false;
                                $responseMessage = 'This item cannot be shipped on this location';
                            }
                        }
                        else{
                            $status = false;
                            $responseMessage = 'This item cannot be shipped on this location';
                        }
                    }
                    else{
                        $status = false;
                        $responseMessage = 'This selected item was not found';
                    }

                    if ($request->remarks != NULL) {
                        session(['order_remarks' => $request->remarks]);
                    }
                    $calculation_box = Helper::calculationBox();
                    if(Session::has('selected_customer_address') && Session::has('selected_customer_billing_address')){
                        $address_selected=true;
                    }else{
                        $address_selected=false;
                    }
                 $message = false;

                    if($address->state){
                    $shipping = ShippingCharge::active()->get();
                    $stateIDs = $shipping->pluck('state_id')->toArray();
                }
                else
                    $shipping = NULL;
                if($shipping == NULL){
                    $class = '';
                    $message = true;
                    $tooltipval = '';
                }
               
                    return response(array(
                        'status' => $status,
                        'data' => [],
                        'default_currency' => Helper::defaultCurrency(),
                        'calculation_box' => $calculation_box,
                        'address_selected' => $address_selected,
                        'address_id' => $address->id,
                        'address_id_not_selected' => CustomerAddress::where('customer_id', Auth::guard('customer')->user()->customer->id)
                        ->whereIn('state_id', $stateIDs)
                        ->where('id', '!=', $address->id)->pluck('id')->toArray(),
                        'response_message' => $responseMessage,
                        'message' => $message,
                    ), 200, []);
                }
            }
        } else {
            if ($request->remarks != NULL) {
                session(['order_remarks' => $request->remarks]);
            }
            return response(array(
                'status' => true,
                'data' => [],
            ), 200, []);
        }
    }
    public function select_customer_billing_address(Request $request)
    {
    
        if (Auth::guard('customer')->check()) {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (!Cart::session($sessionKey)->isEmpty()) {
                    $address = CustomerAddress::find($request->address_id);
                    session(['selected_customer_billing_address' => $request->address_id]);
                    session(['selected_billing_address' => $request->address_id]);
                    if ($request->remarks != NULL) {
                        session(['order_remarks' => $request->remarks]);
                    }
                    if(Session::has('selected_customer_address') && Session::has('selected_customer_billing_address')){
                        $address_selected=true;
                    }else{
                        $address_selected=false;
                    }
                    return response(array(
                        'status' => true,
                        'data' => [],
                        'address_id' => $address->id,
                        'address_id_not_selected' => CustomerAddress::where('customer_id', Auth::guard('customer')->user()->customer->id)->where('id', '!=', $address->id)->pluck('id')->toArray(),
                        'address_selected'=>$address_selected,
                    ), 200, []);
                }
            }
        } else {
            if ($request->remarks != NULL) {
                session(['order_remarks' => $request->remarks]);
            }
            return response(array(
                
                'status' => true,
                'data' => [],
            ), 200, []);
        }
    }

    public function add_order_remarks(Request $request)
    {
        if ($request->remarks != NULL) {
            session(['order_remarks' => $request->remarks]);
        }
        return response(array('status' => true, 'message' => 'Order Remark Added Successfully'));
    }

    public function change_location(Request $request)
    {
        $state = State::find($request->state_id);
        if ($state) {
            $country = $state->country;
            Session::put('country', $country->id);
            Session::put('state', $state->id);
        }
        return response()->json(['status' => true]);
    }

    public function payment(Request $request)
    {
        $calculation_box = Helper::calculationBox();
        if (Auth::guard('customer')->check()) {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (!Cart::session($sessionKey)->isEmpty()) {
                    if (Session::has('selected_shipping_address')) {
                        $sessionKey = session('session_key');
                        $selectedAddress = CustomerAddress::find(session('selected_shipping_address'));
                        session(['shipping_charge' => $calculation_box['shippingAmount']]);
                        $cartContents = $this->cartData();
                        return view('frontend/payment', compact('selectedAddress', 'sessionKey', 'calculation_box'));
                    } else {
                        return redirect('/checkout');
                    }
                } else {
                    return redirect('/cart');
                }
            } else {
                return redirect('/cart');
            }
        } else {
            if (Session::has('session_key')) {
                $sessionKey = session('session_key');
                if (!Cart::session($sessionKey)->isEmpty()) {
                    if (Session::has('address')) {
                        $sessionKey = session('session_key');
                        $selectedAddress = [];
                        session(['shipping_charge' => $calculation_box['shippingAmount']]);
                        $cartContents = $this->cartData();
                        return view('frontend/payment', compact('selectedAddress', 'sessionKey', 'calculation_box'));
                    } else {
                        return redirect('/checkout');
                    }
                } else {
                    return redirect('/cart');
                }
            } else {
                return redirect('/cart');
            }
        }
    }

    public function cod_charge_apply(Request $request)
    {
        if ($request->payment_method == 'COD') {
            $siteInformation = SiteInformation::first();
            if ($siteInformation != NULL) {
                if ($siteInformation->cod_extra_charge == '0.00') {
                    $amount = 0;
                    $status = false;
                    $message = 'COD Charges Removed';
                } else {
                    $amount = $siteInformation->cod_extra_charge;
                    $status = true;
                    $message = 'COD Charges Applied';
                }
            } else {
                $amount = 0;
                $status = false;
                $message = 'COD Charges Removed';
            }
        } else {
            $amount = 0;
            $status = false;
            $message = 'COD Charges Removed';
        }
        return response(array(
            'status' => $status,
            'cost' => $amount,
            'message' => $message,
            'currency' => Helper::defaultCurrency()
        ), 200, []);
    }

    public function saveAddress($type)
    {
    
        $customerAddress = new CustomerAddress;
        $customerAddress->customer_id = Null;
        $customerAddress->first_name = session($type . '_first_name');
        $customerAddress->last_name = session($type . '_last_name');
        $customerAddress->address = session($type . '_address');
        $customerAddress->email = session($type . '_email');
        $customerAddress->phone = session($type . '_phone');
        $customerAddress->address_type =  'Home';
        $customerAddress->state_id = session($type . '_state');
       $customerAddress->zipcode = session($type . '_zipcode') ?? 'N/A';
        // $customerAddress->zipcode = 'N/A';
        $customerAddress->save();
        return $customerAddress;
    }

    // public function submit_order(Request $request)
    // {

         
      
    //     if (Session::has('session_key')) {
    //         $sessionKey = session('session_key');
    //         if (!Cart::session($sessionKey)->isEmpty()) {
    //             $calculation_box = Helper::calculationBox();
    //             $siteInformation = SiteInformation::first();
                
    //             $orderCode = Order::order_code();
    //             $order = new Order();
    //             $order->order_code = $orderCode;
    //             $order->payment_method = $request->payment_method;
    //             $order->cod_extra_charge = 0;
    //             $order->remarks = "good";
    //             $tax_amount = $calculation_box['tax_amount'];
    //             $order->tax = $siteInformation->tax;
    //             $order->tax_type = $siteInformation->tax_type;
    //             $order->tax_amount = $tax_amount;
    //             $order->shipping_charge = $calculation_box['shippingAmount'];
    //             $order->currency = "INR";
    //             $order->currency_charge = 25;
    
    //             if ($order->save()) {

    //                 if (!empty($request->name)) {
    //                  $personalDetail = new PersonalDetails();
    //                  $personalDetailsData = [];

    //                  // Prepare array of personal details data
    //                  foreach ($request->name as $key => $name) {
    //                     $personalDetail = new PersonalDetails();
    //                     $personalDetail->order_id = $order->id;
    //                     $personalDetail->name = $request->name[$key] ?? '';
    //                     $personalDetail->age = $request->age[$key] ?? '';
    //                     $personalDetail->address = $request->address ?? '';
    //                     $personalDetail->passport_number = $request->passport_number ?? '';
    //                     $personalDetail->pnr = $request->pnr[$key] ?? '';
    //                     $personalDetail->country = $request->country ?? '';
    //                     $personalDetail->state = $request->state ?? '';
    //                     $personalDetail->city = $request->city ?? '';
    //                     $personalDetail->gender = $request->gender[$key] ?? '';
    //                     $personalDetail->pincode = $request->pincode ?? '';
                    
                    
                    
    //                     $personalDetail->save();
    //                 }
                
 
    //                  // Insert multiple PersonalDetail records
    //                  if (!empty($personalDetailsData)) {
    //                      PersonalDetail::insert($personalDetailsData);
    //                  }

    //                 }

    //                 $order_customer = new OrderCustomer;
    //                 $order_customer->order_id = $order->id;
    //                 if (Auth::guard('customer')->check()) {
    //                     $order_customer->user_type = 'User';
    //                     $order_customer->customer_id = Auth::guard('customer')->user()->customer->id;
    //                     $order_customer->billing_address = "demo";
    //                     $order_customer->shipping_address = "demo";
    //                 } else {
    //                     return response()->json([
    //                         'status' => false,
    //                         'message' => 'Please login',
    //                         'data' => '/'
    //                     ], 200);
    //                 }
    
    //                 if ($order_customer->save()) {
    //                     $saved = $notSaved = $alreadyExist = $orderSaved = $orderNotSaved = [];
    //                     foreach (Cart::session($sessionKey)->getContent() as $row) {
    //                         $product_id = $row->id;
    //                         $product = Product::find($product_id);
    //                         $detail = new OrderProduct;
    //                         $detail->order_id = $order->id;
    //                         $detail->product_id = $product_id;
    //                         $detail->qty = $row->quantity ?? 0;
    //                         $detail->cost = $row->price ?? 0;
    //                         $detail->offer_id = 0;
    //                         $detail->offer_amount = 0;
    //                         $detail->total = $row->price ?? 0;
    //                         $detail->coupon_value = 0;
    //                         $detail->coupon_after_price = 0;
    //                         $detail->entry_date = $row->attributes['entry_date'] ?? '';
    //                         $detail->exit_date = $row->attributes['setdate'] ?? '';
    //                         $detail->travel_sector = $row->attributes['travel_sector'] ?? '';
    //                         $detail->flight_number = $row->attributes['flight_number'] ?? '';
    //                         $detail->travel_type = $row->attributes['travel_type'] ?? '';
    //                         $detail->origin = $row->attributes['origin'] ?? '';
    //                         $detail->destination = $row->attributes['destination'] ?? '';
    //                         $detail->guest = $row->attributes['guest'] ?? 0;
    //                         $detail->terminal = $row->attributes['terminal'] ?? '';
    //                         $detail->bag_count = $row->attributes['bag_count'] ?? 0;
    //                         $detail->entry_time = $row->attributes['entry_time'] ?? '';
    //                         $detail->exit_time = $row->attributes['exit_time'] ?? '';
    //                         $detail->adults = $row->attributes['adults'] ?? '';
    //                         $detail->infants = $row->attributes['infants'] ?? '';
    //                         $detail->children = $row->attributes['children'] ?? '';
    //                         $detail->porter_count = $row->attributes['guest'] ?? '';
    //                         $detail->pnr = $row->attributes['pnr'] ?? '';
    
    
    //                         if ($detail->save()) {
    //                             $order_log = new OrderLog;
    //                             $order_log->order_product_id = $detail->id;
    //                             $order_log->status = 'Pending';
    //                             if ($order_log->save()) {
    //                                 $orderSaved[] = 1;
    //                             } else {
    //                                 $orderNotSaved[] = 1;
    //                                 $notSaved[] = 1;
    //                             }
    //                         } else {
    //                             $notSaved[] = 1;
    //                         }
    //                     }
    //                     if (empty($notSaved) && empty($orderNotSaved)) {
    //                         // Clear the cart session after the order is successfully processed
    //                         Cart::session($sessionKey)->clear();
                            
    //                         $couponSavedErrorArray = $couponSavedSuccessArray = [];
                            
    //                         if (empty($couponSavedErrorArray)) {
    //                             if ($request->payment_method == 'COD') {
    //                                 $response = $this->order_success($order->id);
    //                                 return response()->json([
    //                                     'status' => $response['status'],
    //                                     'message' => $response['message'],
    //                                     'data' => $response['data']
    //                                 ], 200);
    //                             } else {
    //                                 $url = url('/payment/' . $order->id);
    //                                 return response()->json(['status' => 'payment', 'url' => $url]);
    //                             }
    //                         } else {
    //                             return response()->json([
    //                                 'status' => true,
    //                                 'message' => 'Error while placing the order, Please try after some time',
    //                                 'data' => '/'
    //                             ], 200);
    //                         }
    //                     }
    //                 }
    //             } else {
    //                 return response()->json([
    //                     'status' => false,
    //                     'message' => 'Error while place the order'
    //                 ], 200);
    //             }
    //         } else {
    //             return response()->json([
    //                 'status' => true,
    //                 'message' => 'Cart is empty',
    //                 'data' => '/cart'
    //             ], 200);
    //         }
    //     } else {
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Cart is empty',
    //             'data' => '/cart'
    //         ], 200);
    //     }
    // }
    // public function submit_order(Request $request)
    // {
    //     if (Session::has('session_key')) {
    //         $sessionKey = session('session_key');
    
    //         if (!Cart::session($sessionKey)->isEmpty()) {
    //             $calculation_box = Helper::calculationBox();
    //             $siteInformation = SiteInformation::first();
    
    //             $orderCode = Order::order_code();
    //             $order = new Order();
    //             $order->order_code = $orderCode;
    //             $order->payment_method = $request->payment_method;
    //             $order->cod_extra_charge = 0;
    //             $order->remarks = "good";
    //             $tax_amount = 10;
    //             $order->tax = $siteInformation->tax;
    //             $order->tax_type = $siteInformation->tax_type;
    //             $order->tax_amount = 10;
    //             $order->shipping_charge = 10;
    //             $order->currency = "INR";
    //             $order->currency_charge = 25;
    //             $order->cod_extra_charge =  $request->final_amount;
    
    //             if ($order->save()) {
    //                 if (!empty($request->name)) {
    //                     $personalDetailsData = [];
    //                     foreach ($request->name as $key => $name) {
    //                         $personalDetailsData[] = [
    //                             'order_id' => $order->id,
    //                             'name' => $request->name[$key] ?? '',
    //                             'age' => $request->age[$key] ?? '',
    //                             'address' => $request->address ?? '',
    //                             'passport_number' => $request->passport_number ?? '',
    //                             'pnr' => $request->pnr[$key] ?? '',
    //                             'country' => $request->country ?? '',
    //                             'state' => $request->state ?? '',
    //                             'city' => $request->city ?? '',
    //                             'gender' => $request->gender[$key] ?? '',
    //                             'pincode' => $request->pincode ?? ''
    //                         ];
    //                     }
    //                     PersonalDetails::insert($personalDetailsData);
    //                 }
    
    //                 $order_customer = new OrderCustomer();
    //                 $order_customer->order_id = $order->id;
    //                 if (Auth::guard('customer')->check()) {
    //                     $order_customer->user_type = 'User';
    //                     $order_customer->customer_id = Auth::guard('customer')->user()->customer->id;
    //                     $order_customer->billing_address = "demo";
    //                     $order_customer->shipping_address = "demo";
    //                 } else {
    //                     return response()->json([
    //                         'status' => false,
    //                         'message' => 'Please login',
    //                         'data' => '/'
    //                     ], 200);
    //                 }
    
    //                 if ($order_customer->save()) {
    //                     foreach (Cart::session($sessionKey)->getContent() as $row) {
    //                         $detail = new OrderProduct();
    //                         $detail->order_id = $order->id;
    //                         $detail->product_id = $row->id;
    //                         $detail->qty = $row->quantity ?? 0;
    //                         $detail->cost = $row->price ?? 0;
    //                         $detail->total = $row->price ?? 0;
    //                         $detail->save();
    
    //                         $order_log = new OrderLog();
    //                         $order_log->order_product_id = $detail->id;
    //                         $order_log->status = 'Pending';
    //                         $order_log->save();
    //                     }
                        
    
    //                     if ($request->payment_method == 'cod') {
    //                         $response = $this->order_success($order->id);
    //                         return response()->json([
    //                             'status' => $response['status'],
    //                             'message' => $response['message'],
    //                             'data' => $response['data']
    //                         ], 200);
    //                     } else {
    //                         $razorpayResponse = $this->createRazorpayOrder($order->id, $order->cod_extra_charge);
    
    //                         if ($razorpayResponse['status'] === 'online-payment') {
                                
    //                             return response()->json([
    //                                 'status' => 'online-payment',
    //                                 'order_id' => $razorpayResponse['order_id'],
    //                                 'amount' => $razorpayResponse['amount'],
    //                                 'currency' => $razorpayResponse['currency'],
    //                                 'key' => $razorpayResponse['key'],
    //                                 'db_orderid' => $order->id
    //                             ], 200);


                               
    //                         } else {
    //                             return response()->json([
    //                                 'status' => 'error',
    //                                 'message' => $razorpayResponse['message']
    //                             ], 200);
    //                         }
    //                     }
    //                 }
    //             } else {
    //                 return response()->json([
    //                     'status' => false,
    //                     'message' => 'Error while placing the order'
    //                 ], 200);
    //             }
    //         } else {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Cart is empty'
    //             ], 200);
    //         }
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Session expired'
    //         ], 200);
    //     }
    // }
    public function submit_order(Request $request)
{
    if (Session::has('session_key')) {
        $sessionKey = session('session_key');

        if (!Cart::session($sessionKey)->isEmpty()) {
            $calculation_box = Helper::calculationBox();
            $siteInformation = SiteInformation::first();

            $orderCode = Order::order_code();
            $order = new Order();
            $order->order_code = $orderCode;
            $order->payment_method = $request->payment_method;
            $order->cod_extra_charge = 0;
            $order->remarks = "good";
            $order->tax = $siteInformation->tax;
            $order->tax_type = $siteInformation->tax_type;
            $order->tax_amount = 10;
            $order->shipping_charge = 10;
            $order->currency = "INR";
            $order->currency_charge = 25;
            $order->cod_extra_charge = $request->final_amount;

            if ($order->save()) {
                if (!empty($request->name)) {
                    $personalDetailsData = [];
                    foreach ($request->name as $key => $name) {
                        $personalDetailsData[] = [
                            'order_id' => $order->id,
                            'name' => $request->name[$key] ?? '',
                            'age' => $request->age[$key] ?? '',
                            'address' => $request->address ?? '',
                            'passport_number' => $request->passport_number ?? '',
                            'pnr' => $request->pnr[$key] ?? '',
                            'country' => $request->country ?? '',
                            'state' => $request->state ?? '',
                            'city' => $request->city ?? '',
                            'gender' => $request->gender[$key] ?? '',
                            'pincode' => $request->pincode ?? ''
                        ];
                    }
                    PersonalDetails::insert($personalDetailsData);
                }

                $order_customer = new OrderCustomer();
                $order_customer->order_id = $order->id;
                if (Auth::guard('customer')->check()) {
                    $order_customer->user_type = 'User';
                    $order_customer->customer_id = Auth::guard('customer')->user()->customer->id;
                    $order_customer->billing_address = "demo";
                    $order_customer->shipping_address = "demo";
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Please login',
                        'data' => '/'
                    ], 200);
                }

                if ($order_customer->save()) {
                    $saved = $notSaved = $alreadyExist = $orderSaved = $orderNotSaved = [];
                    foreach (Cart::session($sessionKey)->getContent() as $row) {
                        $detail = new OrderProduct();
                        $detail->order_id = $order->id;
                        $detail->product_id = $row->id;
                        $detail->qty = $row->quantity ?? 0;
                        $detail->cost = $row->price ?? 0;
                        $detail->total = $row->price ?? 0;
                        $detail->offer_id = 0;
                        $detail->offer_amount = 0;
                        $detail->coupon_value = 0;
                        $detail->coupon_after_price = 0;
                        $detail->entry_date = $row->attributes['entry_date'] ?? '';
                        $dateString = $row->attributes['setdate'] ?? '';
                        $formattedDate = '';
                        
                        if ($dateString) {
                            $dateTime = DateTime::createFromFormat('d/m/Y', $dateString);
                            if ($dateTime) {
                                $formattedDate = $dateTime->format('Y-m-d H:i:s');
                            }
                        }
                        
                        $detail->exit_date = $formattedDate;
                        
                        $detail->travel_sector = $row->attributes['travel_sector'] ?? '';
                        $detail->flight_number = $row->attributes['flight_number'] ?? '';
                        $detail->travel_type = $row->attributes['travel_type'] ?? '';
                        $detail->origin = $row->attributes['origin'] ?? '';
                        $detail->destination = $row->attributes['destination'] ?? '';
                        $detail->guest = $row->attributes['guest'] ?? 0;
                        $detail->terminal = $row->attributes['terminal'] ?? '';
                        $detail->bag_count = $row->attributes['bag_count'] ?? 0;
                        $detail->entry_time = $row->attributes['entry_time'] ?? '';
                        $detail->exit_time = $row->attributes['exit_time'] ?? '';
                        $detail->adults = $row->attributes['adults'] ?? '';
                        $detail->infants = $row->attributes['infants'] ?? '';
                        $detail->children = $row->attributes['children'] ?? '';
                        $detail->porter_count = $row->attributes['guest'] ?? '';
                        $detail->pnr = $row->attributes['pnr'] ?? '';

                        if ($detail->save()) {
                            $order_log = new OrderLog();
                            $order_log->order_product_id = $detail->id;
                            $order_log->status = 'Pending';
                            if ($order_log->save()) {
                                $orderSaved[] = 1;
                            } else {
                                $orderNotSaved[] = 1;
                                $notSaved[] = 1;
                            }
                        } else {
                            $notSaved[] = 1;
                        }
                    }

                    if (empty($notSaved) && empty($orderNotSaved)) {
                        // Clear the cart session after the order is successfully processed
                        
                        if ($request->payment_method == 'cod') {
                            $response = $this->order_success($order->id);
                            return response()->json([
                                'status' => $response['status'],
                                'message' => $response['message'],
                                'data' => $response['data']
                            ], 200);
                        } else {
                            $razorpayResponse = $this->createRazorpayOrder($order->id, $order->cod_extra_charge);

                            if ($razorpayResponse['status'] === 'online-payment') {
                                return response()->json([
                                    'status' => 'online-payment',
                                    'order_id' => $razorpayResponse['order_id'],
                                    'amount' => $razorpayResponse['amount'],
                                    'currency' => $razorpayResponse['currency'],
                                    'key' => $razorpayResponse['key'],
                                    'db_orderid' => $order->id
                                ], 200);
                            } else {
                                return response()->json([
                                    'status' => 'error',
                                    'message' => $razorpayResponse['message']
                                ], 200);
                            }
                        }
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Error while placing the order, Please try after some time'
                        ], 200);
                    }
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Error while placing the order'
                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Cart is empty'
            ], 200);
        }
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Session expired'
        ], 200);
    }
}


    public function createRazorpayOrder($orderId, $extraCharge)
    {
        $api = new Api(Config::get('services.razorpay.key'), Config::get('services.razorpay.secret'));
    
        // Ensure amount is an integer
        $amount = (int)($extraCharge * 100); // Convert to paise
        // Ensure receipt is a string
        $receipt = (string)$orderId;
    
        $orderData = [
            'amount' => $amount,
            'currency' => 'INR',
            'receipt' => $receipt,
            'payment_capture' => 1 // Auto-capture
        ];
    
        Log::info('Creating Razorpay order with data:', $orderData);
    
        try {
            $order = $api->order->create($orderData);
    
            return [
                'status' => 'online-payment',
                'order_id' => $order->id,
                'amount' => $order->amount,
                'currency' => $order->currency,
                'key' => Config::get('services.razorpay.key')
            ];
        } catch (\Exception $e) {
            // Log detailed error
            Log::error('Razorpay order creation error: ' . $e->getMessage());
    
            return [
                'status' => 'error',
                'message' => 'Failed to create Razorpay order. Error: ' . $e->getMessage()
            ];
        }
    }
    
    

    public function initiatePayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        
        $order = $api->order->create([
            'receipt'         => 'order_rcptid_11',
            'amount'          => $request->amount * 100, // amount in the smallest currency unit
            'currency'        => 'INR'
        ]);

        $orderId = $order['id'];

        return view('web.razorpay-payment', compact('orderId'));
    }

    public function handlePayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));


        $orderId = $request->db_orderid;
    
        $signature = $request->razorpay_signature;
        $orderId = $request->razorpay_order_id;
        $paymentId = $request->razorpay_payment_id;
    
        try {
            $api->utility->verifyPaymentSignature([
                'razorpay_signature' => $signature,
                'razorpay_order_id' => $orderId,
                'razorpay_payment_id' => $paymentId
            ]);

            
        $orderId = $request->db_orderid;

        $response = $this->order_success($orderId);
    
            
    
            return response()->json(['status' => 'success',  'message' => 'Order has been placed successfully',]); // Redirect to home page after successful payment
        } catch (\Exception $e) {
            // Handle verification failure
            return response()->json(['status' => 'error', 'message' => 'Your Payment not completed']);
        }
    }
    

    // PaymentController.php
public function verify(Request $request)
{
    $paymentId = $request->input('payment_id');
    $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

    try {
        $payment = $api->payment->fetch($paymentId);
        // Verify payment here (check status, etc.)

        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false]);
    }
}


    public function order_success($order_id)
    {
        // DB::beginTransaction();
        $order = Order::find($order_id);
        $order->payment_mode = 'Success'; // Ensure 'Success' is a valid enum value
        $order->save();
        $order_products = OrderProduct::where('order_id', $order_id)->get();
        foreach ($order_products as $order_product) {
            $order_log = OrderLog::where('order_product_id', $order_product->id)->first();
            $order_log->status = 'Processing'; //for payment success
            if ($order_log->save()) {
                $orderSaved[] = 1;
            } else {
                $orderNotSaved[] = 1;
            }
            $product = Product::find($order_product->product_id);
           
        }
       

       

           
            $this->clear_order_cart_sessions();

            


            if (Helper::sendOrderPlacedMail($order->id, '1')) {

                
                return array(
                    'status' => true,
                    'message' => 'Order "Primefly#' . $order->order_code . '" has been placed successfully',
                    'data' => '/response/' . $order->id,
                );
            } else {
                return array(
                    'status' => true,
                    'message' => 'Order "Primefly#' . $order->order_code . '" has been placed successfully, error while send the mail',
                    'data' => '/response/' . $order->id,
                );
            }
       
    }


    public function clear_order_cart_sessions()
    {
        $sessionKey = session('session_key');

    // Clear all items in the cart session
    Cart::session($sessionKey)->clear();

        session()->forget('session_key');
        session()->forget('selected_billing_address');
        session()->forget('selected_shipping_address');
        session()->forget('selected_customer_address');
        session()->forget('order_remarks');
        session()->forget('shipping_charge');
        session()->forget('coupons');
        session()->forget('coupon_value');
        session()->forget('credit_point');
        /*** Guest session ****/
        foreach (['billing', 'shipping'] as $addressType) {
            session()->forget($addressType . '_first_name');
            session()->forget($addressType . '_last_name');
            session()->forget($addressType . '_phone');
            session()->forget($addressType . '_email');
            session()->forget($addressType . '_address');
            session()->forget($addressType . '_zipcode');
            session()->forget($addressType . '_country_name');
            session()->forget($addressType . '_state_name');
            session()->forget($addressType . '_country');
            session()->forget($addressType . '_state');
        }
    } 
    public function response($order_id)
    {
        $order = Order::find($order_id);
        if ($order != NULL) {
            $seo_data = $this->seo_content('Thank You');
            $orderDetails = OrderCustomer::where('order_id', '=', $order_id)->first();
            if (Auth::guard('customer')->check()) {
                $orderData = Order::with('orderProducts')->with(['orderCustomer' => function ($c) use ($orderDetails) {
                    $c->with('customerData');
                    $c->with('billingAddress');
                    $c->where('customer_id', '=', $orderDetails->customer_id);
                }])->with('orderCoupons')->find($order_id);
            } else {
                $orderData = Order::with('orderProducts')->with('orderCustomer')->with('orderCoupons')->find($order_id);
            }
            $banner = Banner::type('contact')->first();
            return view('web.thank_you', compact('order', 'seo_data'));
        } else {
            return view('web.404');
        }
    }

    public function order_detail($order_code)
    {
        if ($order_code) {
            $order_code = base64_decode($order_code);
            $orderDetails = Order::where('order_code', $order_code)->first();
            if ($orderDetails) {
                $siteInformation = SiteInformation::first();
                $orderTotal = Order::getProductTotal($orderDetails->id);
                $orderGrandTotal = Order::OrderGrandTotal($orderDetails->id);
                if (Auth::guard('customer')->check()) {
                    $order = Order::with(['orderProducts' => function ($t) {
                        $t->with('productData');
                        $t->with('colorData');
                    }])->with(['orderCustomer' => function ($c) {
                        $c->with('customerData');
                        $c->with('billingAddress');
                        $c->with('shippingAddress');
                        $c->where('customer_id', '=', Auth::guard('customer')->user()->customer->id);
                    }])->with('orderCoupons')->find($orderDetails->id);
                    if (Auth::guard('customer')->user()->customer->id == $order->orderCustomer->customer_id) {
                        return view('web.order_detail', compact('order', 'orderTotal', 'orderGrandTotal', 'siteInformation'));
                    } else {
                        abort(404, 'You are not authorised to view this order');
                    }
                } else {
                    $order = Order::with(['orderProducts' => function ($t) {
                        $t->with('productData');
                        $t->with('colorData');
                    }])->with('orderCustomer')->with('orderCoupons')->find($orderDetails->id);
                    return view('web.order_detail', compact('order', 'orderTotal', 'orderGrandTotal', 'siteInformation'));
                }
            } else {
                return view('web.404');
            }
        } else {
            return view('web.404');
        }
    }

    public function cancel_order(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            $order = OrderLog::where('order_product_id', $request->product_id)->latest()->first();
            if ($request->order_status == "cancel") {
                if ($order->status == "Processing" || $order->status == "Packed") {
                    $orderData = Order::find($request->order_id);
                    $updateOrder = new OrderLog;
                    $updateOrder->order_product_id = $order->order_product_id;
                    $updateOrder->remarks = $request->reason;
                    $updateOrder->status = "Cancelled";
                    if ($updateOrder->save()) {
                        Helper::sendOrderCancelledMail($orderData, $request->reason, $updateOrder);
                        return response()->json(['status' => true, 'message' => "Order 'ARTMYST#" . $orderData->order_code . "' has been cancelled"]);
                    } else {
                        return response()->json(['status' => 'error', 'message' => 'Error : Please enter a valid email id']);
                    }
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Error : Not possible to cancel the order']);
                }
            } else {
                /*if($order->status=="Completed"){
                    $orderData = Order::find($request->order_id);
                    $updateOrder = new OrderLog;
                    $updateOrder->order_product_id=$order->order_product_id;
                    $updateOrder->remarks=$request->reason;
                    $updateOrder->status="Cancelled";
                    if($updateOrder->save()){
                        return response(array(
                            'status' => true,
                            'message' => "Order '".$orderData->order_code."' has been returned",
                            'type'=>'success',
                            'key'=>'Success',
                        ),200,[]);
                    }else{
                        return response(array(
                            'status' => true,
                            'message' => "Error while cancelling the order, Please try after some time",
                            'type'=>'error',
                            'key'=>'Error',
                        ),200,[]);
                    }
                }else{
                    return response(array(
                        'status' => true,
                        'message' => "Not possible to cancel the order",
                        'type'=>'error',
                        'key'=>'Error',
                    ),200,[]);
                }*/

                return response()->json(['status' => 'error', 'message' => 'Error : Not possible to cancel the order']);

            }
        } else {
            return response(array(
                'status' => true,
                'message' => 'Please login to continue',
                'data' => 'login',
                'type' => 'error'
            ), 200, []);
        }
    }

    public function return_order(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            $order = OrderLog::where('order_product_id', $request->return_product_id)->latest()->first();
            if ($request->return_order_status == "return") {
                if ($order->status == "Out for Delivery" || $order->status == "Delivered") {
                    $orderData = Order::find($request->return_order_id);
                    $updateOrder = new OrderLog;
                    $updateOrder->order_product_id = $order->order_product_id;
                    $updateOrder->remarks = $request->reason;
                    $updateOrder->refund_type = $request->refund_method;
                    $updateOrder->account_holder_name = $request->account_holder_name;
                    $updateOrder->ifsc_code = $request->ifsc_code;
                    $updateOrder->account_number = $request->account_number;
                    $updateOrder->status = "Return";
                    if ($updateOrder->save()) {
                        return response(array(
                            'status' => true,
                            'message' => "Order 'ARTMYST#" . $orderData->order_code . "' has been returned",
                            'type' => 'success',
                            'key' => 'Success',
                        ), 200, []);
                    } else {
                        return response(array(
                            'status' => true,
                            'message' => "Error while returning the order, Please try after some time",
                            'type' => 'error',
                            'key' => 'Error',
                        ), 200, []);
                    }
                } else {
                    return response(array(
                        'status' => true,
                        'message' => "Not possible to return the order",
                        'type' => 'error',
                        'key' => 'Error',
                    ), 200, []);
                }
            } else {

            }
        }
    }

    public function apply_coupon(Request $request)
    {
   
        $coupon = Coupon::where([['status', 'Active'], ['code', $request->coupon]])->first();
       
        if ($coupon) {
            $response = Helper::coupon_application($coupon, $request->credit_point);
            return response(array(
                'status' => $response['status'],
                'message' => $response['message'],
            ), 200, []);
        } else {
            return response(array(
                'status' => 'error',
                'message' => "Coupon not found",
            ), 200, []);
        }
    }


    public function remove_coupon(Request $request)
    {
        if (Session::has('coupons')) {
            Helper::removeSessionCoupon($request->coupon);
            return response(array(
                'status' => 'success',
                'message' => "Coupon Removed",
            ), 200, []);
        } else {
            return response(array(
                'status' => 'error',
                'message' => "Coupon not found",
            ), 200, []);
        }
    }
}

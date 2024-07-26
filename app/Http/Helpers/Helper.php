<?php

namespace App\Http\Helpers;

use App\Http\Controllers\Web\CartController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Color;
use App\Models\ContactAddress;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\CustomerAddress;
use App\Models\DatabaseStorageModel;
use App\Models\Deal;
use App\Models\Menu;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOfferSize;
use App\Models\ProductPrice;
use App\Models\ProductReview;
use App\Models\RecentlyViewedProduct;
use App\Models\Shape;
use App\Models\ShippingCharge;
use App\Models\SideMenu;
use App\Models\SiteInformation;
use App\Models\User;

use Buglinjo\LaravelWebp\Facades\Webp;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use NumberFormatter;
use PHPMailer\PHPMailer\PHPMailer;
use Termwind\Components\Dd;

class Helper
{

    /**
     * Return the site prefix keyword
     *
     * @return string admin panel url prefix
     */
    public static function sitePrefix()
    {
        return strtolower('admin/');
    }

    /**
     * Return the authenticated user's type
     *
     * @return string user type
     */
    public static function loggedUserType()
    {
        return strtolower(Auth::guard('admin')->user()->user_type);
    }


    /**
     * Return the authenticated user's name
     *
     * @return string user's name
     */
    public static function loggedUserName()
    {
        $logged = Auth::guard('admin')->user();
        if ($logged) {
            $type = self::loggedUserType();
            $user = $logged->$type;
            return $user->name;
        }
    }

    /**
     * Return the authenticated user's name
     *
     * @return string user's name
     */
    public static function loggedUserProfileImage()
    {
        $user = Auth::guard('admin')->user();
        $image = asset('backend/dist/img/unknown.png');
        if ($user) {
            if ($user->profile_image != NULL && File::exists(public_path($user->profile_image))) {
                $image = asset($user->profile_image);
            }
        }
        return $image;
    }

    public static function loggedCustomerName()
    {
        $logged = Auth::guard('customer')->user()->customer;
        $name = '';
        if ($logged) {
            $name = $logged->first_name . ' ' . $logged->last_name;
        }
        return $name;
    }
    public static function setSessionKey($sessionKey){
        Session::put('session_key', $sessionKey);
        $sessionKey = Session::get('session_key');
       return $sessionKey;
    }
    public static function getSessionKey(){
        $sessionKey = '';
        if (Session::has('session_key')) {
            $sessionKey = Session::get('session_key');
        }
        return $sessionKey;
    }

    public static function commonData()
    {
        $siteInformation = SiteInformation::first();
        $menus = Menu::active()->with('category')->oldest('sort_order')->get();
       
        $sideMenus = SideMenu::active()->oldest('sort_order')->get();
        $calculation_box = self::calculationBox();
       
        $blogCount = Blog::active()->count();
        $sessionKey = '';
        if (Session::has('session_key')) {
            $sessionKey = Session::get('session_key');
        }

       
        
        $address = ContactAddress::active()->first();
        return View::share(compact('siteInformation', 'menus', 'blogCount', 'sessionKey',   'address','sideMenus'));
    }

    public static function calculationBox()
    {
        //update item prices
        self::updateCartItemPrice();
        $return_result = [];
        if (Session::has('session_key')) {
            $siteInformation = SiteInformation::first();
            $sessionKey = session('session_key');
            $grand_total = Cart::session($sessionKey)->getTotal();
            $currency_rate = 25;
            $shippingFreeArray = [];
            if (Session::has('coupons')) {
                foreach (session('coupons') as $session_coupon) {
                    $coupon = Coupon::where([['status', 'Active'], ['code', $session_coupon['code']]])->first();
                    self::coupon_application($coupon);
                    if ($coupon->is_free_shipping == 'Yes') {
                        $shippingFreeArray[] = '1';
                    }
                }
            }
            if (Session::has('coupon_value')) {
                $grand_total = $grand_total - session('coupon_value');
            }
            $shippingAmount = '0.00';
            if (!$shippingFreeArray) {
                if (Auth::guard('customer')->check()) {
                    if (Session::has('selected_shipping_address')) {
                        $customerAddress = CustomerAddress::active()->find(session('selected_shipping_address'));
                    } else {
                        $customerAddress = CustomerAddress::active()->where('customer_id', Auth::guard('customer')->user()->customer->id)
                            ->where('is_default', 'Yes')->first();
                    }
                    if ($customerAddress) {
                        $shippingAmount = ShippingCharge::getShippingCharge($customerAddress->state_id, $grand_total);
                    } else {
                        $shippingAmount = '0.00';
                    }
                } else {
                    if (Session::has('shipping_state')) {
                        $shippingAmount = ShippingCharge::getShippingCharge(session('shipping_state'), $grand_total);
                    } else {
                        $shippingAmount = '0.00';
                    }
                }
            }
            $tax_amount = 0.00;
            if ($siteInformation->tax != 0) {
                if ($siteInformation->tax_type == "Outside") {
                    $tax_amount = $grand_total * $siteInformation->tax / 100;
                    $grand_total = $grand_total + $tax_amount;
                }
            }
            $grandTotal = $grand_total + $shippingAmount;
            $return_result['shippingAmount'] = $shippingAmount;
            $return_result['tax_amount'] = $tax_amount;
            $return_result['final_total_with_tax'] = $grandTotal;
        }
        return $return_result;
    }
    public static function updateCartItemPrice()
    {
        if (Session::has('session_key')) {
            $sessionKey = session('session_key');
            if (!Cart::session($sessionKey)->isEmpty()) {
                foreach (Cart::session($sessionKey)->getContent() as $row) {
                    // Extract the original product ID from the unique ID
                    $originalProductId = explode('_', $row->id)[0];
                    $product = Product::find($originalProductId);
    
                    if ($product) {
                        $offer_amount = '0.00';
                        $offer_id = '0';
                        $product_price = $row->price;
    
                        Cart::session($sessionKey)->update($row->id, [
                            'price' => $product_price,
                            'guest' => $row->guest,
                            'quantity' => $row->quantity,
                            'name' => $row->name,
                            'attributes' => [
                                'guest' => $row->attributes->guest,
                                'entry_date' => $row->attributes->entry_date,
                                'setdate' => $row->attributes->setdate,
                                'origin' => $row->attributes->origin,
                                'destination' => $row->attributes->destination,
                                'travel_sector' => $row->attributes->travel_sector,
                                'flight_number' => $row->attributes->flight_number,
                                'travel_type' => $row->attributes->travel_type,
                                'terminal' => $row->attributes->terminal,
                                'entry_time' => $row->attributes->entry_time,
                                'exit_time' => $row->attributes->exit_time,
                                'bag_count' => $row->attributes->bag_count,
                                'adults' => $row->attributes->adults,
                                'infants' => $row->attributes->infants,
                                'children' => $row->attributes->children,
                                'porter_count' => $row->attributes->guest,
                                'pnr' => $row->attributes->pnr,
                                'meet_guest' => $row->attributes->meet_guest,
                            ],
                            'conditions' => [],
                        ]);
                    }
                }
            }
        }
    }
    

    public static function getCartItemCount()
    {
        $cartItemCount = 0;
        if (Session::has('session_key')) {
            $sessionKey = session('session_key');
            if (!Cart::session($sessionKey)->isEmpty()) {
                foreach (Cart::session($sessionKey)->getContent() as $row) {
                    $cartItemCount ++ ;
                }
            }
        }
        return $cartItemCount;
    }

    /**
     * Rename a file with underscore and increment number if the file exists in the provided location
     * and uploads that file.
     *
     * @param file $file The file value from file input field.
     * @param string $fileNAme The name to be added for the file.
     * @param string $location The location where the file is to be saved.
     *
     * @return string The 'renamed' file name with location.
     */
    public static function uploadFile($file, $location, $fileName = null)
    {
        if (!File::exists(public_path($location))) {
            File::makeDirectory(public_path($location), 0777, true);
        }
        if ($fileName == null) {
            list($name, $ext) = explode('.', $file->getClientOriginalName());
            $fileName = $name;
        }
        $fileName = str_replace(' ', '-', strtolower($fileName));
        $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . time() . '.' . $file->getClientOriginalExtension();
        $fileName = str_replace('--', '-', $fileName);
        $target = $location . $fileName;
        if (File::exists(public_path($target))) {
            $increment = 0;
            list($name, $ext) = explode('.', $fileName);
            while (File::exists(public_path($target))) {
                $increment++;
                $fileName = $name . '_' . $increment . '.' . $ext;
                $target = $location . $fileName;
            }
        }
        $file->move(public_path($location), $fileName);
        return $target;
    }

    public static function deleteFile($collection, $fieldName)
    {
        if (File::exists(public_path($collection->$fieldName))) {
            File::delete(public_path($collection->$fieldName));
        }
    }


     public static function sendOrderPlacedMail($order, $flag)
    {
        if ($flag == '1') {
            $orderData = Order::find($order);
            if ($orderData != NULL) {
                if ($orderData->orderCustomer->user_type == "User") {
                    $order = Order::with(['orderProducts' => function ($t) {
                        $t->with('productData');
                    }])->with(['orderCustomer' => function ($c) use ($orderData) {
                        $c->with('customerData');
                        $c->with('billingAddress');
                        $c->where('customer_id', $orderData->orderCustomer->customer_id);
                    }])->with('orderCoupons')->find($orderData->id);
                } else {
                    $order = Order::with(['orderProducts' => function ($t) {
                        $t->with('productData');
                    }])->with('orderCustomer')->with('orderCoupons')->find($orderData->id);
                }
            }
        }
        $common = SiteInformation::first();
        $contactAddress = ContactAddress::where('status', 'Active')->first();
        $customerAddress = $order->orderCustomer->CustomerData;
        $to = $customerAddress->user->email;
        $to_name = $customerAddress->first_name ;
        $link = url('order/' . base64_encode($order->order_code));
        $orderGrandTotal = Order::OrderGrandTotal($order->id);
       
        $orderTotal = Order::getProductTotal($order->id);
        //mail to customer
     $emails = explode(',', $common->order_emails);
     //send mail to multiple emails
       
        Mail::send('mail_templates.order_invoice_v2', array('order' => $order, 'name' => $to_name, 'common' => $common,
            'orderGrandTotal' => $orderGrandTotal, 'orderTotal' => $orderTotal, 'title' => 'Congratulations, Order Successful!',
            'link' => $link), function ($message) use ($to, $to_name, $common,$contactAddress) {
            $message->to($to, $to_name)->subject(config('app.name') . ' - Order Placed');
            $message->from($common->email, $common->email_recipient);
        });        //mail to admin
        foreach ($emails as $email) {
            Mail::send('mail_templates.order_invoice_v2', array('order' => $order, 'name' => $to_name, 'common' => $common,
                'orderGrandTotal' => $orderGrandTotal, 'orderTotal' => $orderTotal, 'title' => 'Congratulations, Order Successful!',
                'link' => $link), function ($message) use ($email, $to_name, $common,$contactAddress) {
                $message->to($email, $to_name)->subject(config('app.name') . ' - Order Placed');
                $message->from($common->email, $common->email_recipient);
            });
        }
        return true;
    }

    /**
     * convert an image file to webp and upload it to specified location.
     *
     * @param file $file The file value from file input field.
     * @param string $location The location where the file is to be saved.
     * @param string $fileName the name of the file.
     *
     * @return string webp file location
     */
    public static function uploadWebpImage($file, $location, $fileName)
    {
        if (!File::exists(public_path($location))) {
            File::makeDirectory(public_path($location), 0777, true);
        }
        $fileName = str_replace(' ', '-', strtolower($fileName));
        $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . time() . '.webp';
        $fileName = str_replace('--', '-', $fileName);

        $target = $location . $fileName;
        if (File::exists(public_path($target))) {

            $increment = 0;
            list($name, $ext) = explode('.', $fileName);
            while (File::exists(public_path($target))) {
                $increment++;
                $fileName = $name . '_' . $increment . '.' . $ext;
                $target = $location . $fileName;
            }
        }
        Webp::make($file)->save(public_path($target));

        return $target;
    }
    


    /**
     * print an image with webp on pages with picture tag.
     *
     * @param Collection $collection The eloquent collection.
     * @param string $field the name of the field.
     * @param string $webpField the name of the webp field.
     * @param string $attributeField the name of the attribute field.
     * @param string $cssClass the css class of the image.
     *
     * @return string html code for printing image on pages.
     */
    public static function printImage($collection, $field, $webpField, $attributeField, $cssClass = null, $cssStyle = null, $pictureClass = null)
    {

       

        
        $imageData = '<picture' . ($pictureClass ? ' class="' . $pictureClass . '"' : '') . '>';
        if (!empty($collection->$webpField) && File::exists(public_path($collection->$webpField))) {
            $imageData .= '<source srcset="' . asset($collection->$webpField) . '" type="image/webp">';
        }
        if (!empty($collection->$field) && File::exists(public_path($collection->$field))) {
            $imageData .= '<img src="' . asset($collection->$field) . '" ' . $collection->$attributeField;
        } else {
            if ($field == 'desktop_image' || $field == 'desktop_banner') {
                $imageData .= '<img src="' . asset('frontend/images/default-image-rect.jpg') . '" alt="Default Image"';
            } else if ($field == 'profile_image') {
                $imageData .= '<img src="' . asset('frontend/images/user_img_de.png') . '" alt="Default Image"';
            } else if ($field == 'author_image') {
                $imageData .= '<img src="' . asset('frontend/images/blog/profile/blog_profile.jpg') . '" alt="Default Image"';
            } else {
                $imageData .= '<img src="' . asset('frontend/images/logo_emirati.png') . '" alt="defaults Image"';
            }
        }
        if ($cssClass) {
            $imageData .= ' class="' . $cssClass . '"';
        }
        if ($cssStyle) {
            $imageData .= ' style="' . $cssStyle . '"';
        }
        $imageData .= ' ></picture>';
        return $imageData;
    }

    public static function mailConf($subject)
    {
        if (!isset($subject)) {
            $subject = config('app.name');
        }
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        //        $mail->SMTPDebug = 2;
        $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
        $mail->Host = config('mail.mailers.smtp.host');  //gmail has host > smtp.gmail.com
        $mail->Port = config('mail.mailers.smtp.port'); //gmail has port > 587 . without double quotes
        $mail->Username = config('mail.mailers.smtp.username'); //your username. actually your email
        $mail->Password = config('mail.mailers.smtp.password'); // your password. your mail password
        $mail->CharSet = 'utf-8';
        $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
        $mail->Subject = $subject;
        $mail->IsHTML(true);
        return $mail;
    }

    public static function sendCredentials($user, $name, $password)
    {
        $subject = "Thank you for registering with us";
        $mail = self::mailConf($subject);
        $searchArr = ["{name}", "{email}", "{phone}", "{password}", "{owner}"];
        $replaceArr = [$name, $user->email, $user->phone, $password, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_templates/send_credentials.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($user->email, $name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Send password reset Email to user
     *
     * @return boolean Returns true when mail is sent else false
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function forgotPassword($user, $name, $link)
    {
        $subject = config('app.name') . " - Forgot Password";
        $mail = self::mailConf($subject);

        $searchArr = ["{name}", "{link}", "{owner}"];
        $replaceArr = [$name, $link, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_templates/forgot_password.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($user->email, $name);
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    public static function verifyemail($user, $name, $link)
    {
        $subject = config('app.name') . " - Verify Email";
        $mail = self::mailConf($subject);

        $searchArr = ["{name}", "{link}", "{owner}"];
        $replaceArr = [$name, $link, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_templates/verify_email.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($user->email, $name);
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }

   


    public static function sendContactMail($contact, $type = Null)
    {
        $common = SiteInformation::first();
        $subject = "Contact form submission details";
        $mail = self::mailConf($subject);
        if ($contact->type == 'product') {
            $searchArr = ["{name}", "{email}", "{product}", "{phone}", "{message}", "{type}", "{site_name}"];
            $replaceArr = [$contact->name, $contact->email, $contact->product->title, $contact->phone, $contact->message, $type, config('app.name')];
            $body = file_get_contents(resource_path('views/mail_templates/product_enquiry.blade.php'));
        } else {
            $searchArr = ["{name}", "{email}", "{phone}",  "{message}", "{type}", "{site_name}"];
            $replaceArr = [$contact->name, $contact->email, $contact->phone, $contact->message, $type, config('app.name')];
            $body = file_get_contents(resource_path('views/mail_templates/enquiry.blade.php'));
        }
        $body = str_replace($searchArr, $replaceArr, $body);
        $contactAddress = SiteInformation::first();
//        dd($common->email);

        $mail->MsgHTML($body);
        $mail->addAddress($common->enquiry_emails, $common->email_recipient);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }

    public static function sendReply($enquiry)
    {
        $subject = "Thank you for contacting us";
        $mail = self::mailConf($subject);
        $searchArr = ["{name}", "{message}", "{reply}", "{site_name}"];
        $replaceArr = [$enquiry->name, $enquiry->message, $enquiry->reply, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_templates/enquiry_reply.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($enquiry->email, $enquiry->name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
    public static function sendpost($user,$customer)
    {
        $subject = "your post uploded .";
        $mail = self::mailConf($subject);
        $searchArr = ["{name}",  "{site_name}"];
        $replaceArr = [$customer->first_name, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_templates/post.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($user->email, $customer->first_name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }

    public static function sendCustomerNewpassword($user, $password)
    {
        $subject = config('app.name') . " - New Password";
        $mail = self::mailConf($subject);
        $searchArr = ["{name}", "{password}", "{owner}"];
        $replaceArr = [$user->customer->first_name . ' ' . $user->customer->last_name, $password, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_templates/send_new_password.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($user->email, $user->customer->first_name . ' ' . $user->customer->last_name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }

    public static function imageDimension($type)
    {
        if ($type == "blog-detail") {
            $dimension['width'] = '510';
            $dimension['height'] = '545';
        } elseif ($type == 'product-detail' || $type == 'wishlist') {
            $dimension['width'] = '800';
            $dimension['height'] = '440';
        } else {
            $dimension['width'] = '1640';
            $dimension['height'] = '375';
        }
        return $dimension;
    }



}


 




 
  


  




  

  


 

   
    
    

   



   

    





   

  



   





    // public  static  function combinationArrays($chars, $size, $combinations = array())
    // {
    //     if (empty($combinations)) {
    //         $combinations = $chars;
    //     }
    //     if ($size == 1) {
    //         return $combinations;
    //     }
    //     $new_combinations = array();
    //     foreach ($combinations as $combination) {
    //         foreach ($chars as $char) {
    //             if ($combination != $char) {
    //                 $new_combinations[$combination][] = $char;
    //             }
    //         }
    //     }
    //     return $this->combinationArrays($chars, $size - 1, $new_combinations);
    // }

    
    


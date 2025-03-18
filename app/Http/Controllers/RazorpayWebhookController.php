<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderCustomer;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class RazorpayWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $razorpaySecret = env('RAZORPAY_WEBHOOK_SECRET'); // ✅ Use Webhook Secret

        $webhookSignature = $request->header('X-Razorpay-Signature');
        $payload = $request->getContent(); // Get raw request body

        // Debug logs
        Log::info("Received Webhook Event: " . $payload);
        Log::info("Received Signature: " . ($webhookSignature ?? 'None'));

        if (!$webhookSignature) {
            Log::error('Webhook Signature Missing!');
            return response()->json(['error' => 'Signature Missing'], 403);
        }

        try {
            // Verify Razorpay Webhook Signature
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $api->utility->verifyWebhookSignature($payload, $webhookSignature, $razorpaySecret);

            Log::info("Webhook Signature Verified Successfully.");

            // Decode Webhook Payload
            $data = json_decode($payload, true);

            // Validate if `event` key exists
            if (!isset($data['event'])) {
                Log::error("Invalid Webhook Event: 'event' key missing");
                return response()->json(['error' => 'Invalid Webhook Event'], 400);
            }

            $event = $data['event'];

            switch ($event) {
                case 'payment.captured':
                    $this->handlePaymentCaptured($data);
                    break;

                case 'payment.failed':
                    $this->handlePaymentFailed($data);
                    break;

                case 'order.paid':
                    $this->handleOrderPaid($data);
                    break;

                default:
                    Log::warning("Unhandled Razorpay Event: $event");
                    return response()->json(['message' => "Unhandled Event: $event"], 200);
            }

            return response()->json(['message' => 'Webhook processed successfully'], 200);
        } catch (SignatureVerificationError $e) {
            Log::error("Razorpay Webhook Signature Verification Failed: " . $e->getMessage());
            return response()->json(['error' => 'Invalid Signature'], 403);
        } catch (\Exception $e) {
            Log::error("Webhook Processing Error: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Handle Payment Captured Event
     */
   

    private function handlePaymentCaptured($data)
    {
        $paymentId = $data['payload']['payment']['entity']['id'] ?? null;
        $orderId = $data['payload']['payment']['entity']['notes']['order_id'] ?? null;
    
        if (!$orderId) {
            Log::error("Payment Captured: 'order_id' missing in notes.");
            return;
        }
    
        $order = Order::where('razorpay_order_id', $orderId)->first();
    
        if ($order) {
            $order->payment_mode = 'Success';
            $order->save();
            Log::info("Order ID $orderId updated to 'Success'.");
    
            // Fetch customer_id using Eloquent model
            $customerId = OrderCustomer::where('order_id', $order->id)->value('customer_id');
    
            if ($customerId) {
                $this->clear_order_cart_sessions_api($customerId);
            } else {
                Log::error("Order ID $orderId: Customer ID not found in order_customer table.");
            }
    
        } else {
            Log::error("Payment Captured: Order ID $orderId not found in database.");
        }
    }
    

    /**
     * Handle Payment Failed Event
     */
    private function handlePaymentFailed($data)
    {
        $paymentId = $data['payload']['payment']['entity']['id'] ?? null;
        $orderId = $data['payload']['payment']['entity']['notes']['order_id'] ?? null;

        if (!$orderId) {
            Log::error("Payment Failed: 'order_id' missing in notes.");
            return;
        }

        $order = Order::where('razorpay_order_id', $orderId)->first();

        if ($order) {
            $order->payment_mode = 'Failed';
            $order->save();
            Log::info("Order ID $orderId updated to 'Failed'.");
        } else {
            Log::error("Payment Failed: Order ID $orderId not found in database.");
        }
    }

    /**
     * Handle Order Paid Event
     */
    private function handleOrderPaid($data)
    {
        $orderId = $data['payload']['order']['entity']['id'] ?? null;

        if (!$orderId) {
            Log::error("Order Paid: 'order_id' missing.");
            return;
        }

        $order = Order::where('razorpay_order_id', $orderId)->first();

        if ($order) {
            $order->payment_mode = 'Success';
            $order->save();
            Log::info("Order ID $orderId marked as Paid.");
            
             $customerId = OrderCustomer::where('order_id', $order->id)->value('customer_id');
    
            if ($customerId) {
                $this->clear_order_cart_sessions_api($customerId);
            } else {
                Log::error("Order ID $orderId: Customer ID not found in order_customer table.");
            }
            
        } else {
            Log::error("Order Paid: Order ID $orderId not found in database.");
        }
    }

    public function clear_order_cart_sessions_api($customerid)

{
    $sessionKey = $customerid;

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

}

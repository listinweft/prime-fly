<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        return Helper::commonData();
    }

    public function charge($order_id)
    {
        $order = Order::find($order_id);
        $user = $order->orderCustomer->billingAddress;
        $calculation_box = Helper::calculationBox();
        $amount = number_format($calculation_box['final_total_with_tax'], 2);
        return view('web.payment', [
            'user' => $user,
            'intent' => $user->createSetupIntent(),
            'order_id' => $order_id,
            'amount' => $amount
        ]);
    }

    public function processPayment(Request $request, $order_id)
    {
        $order = Order::find($order_id);
        $user = $order->orderCustomer->billingAddress;
        $calculation_box = Helper::calculationBox();
        $amount = number_format($calculation_box['final_total_with_tax'], 2);
        $description = 'Order of : ' . $user->first_name . ' ' . $user->last_name . ' with order id ' . $order_id;
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try {
            $user->charge($amount * 100, $paymentMethod);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error while Payment. ' . $e->getMessage()]);
        }
        $response = app(CartController::class)->order_success($order_id);
        return redirect(url($response['data']));
    }

}

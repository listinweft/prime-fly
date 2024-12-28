<?php

namespace App\Services;

use Razorpay\Api\Api;

class RazorpayService
{
    protected $api;

    public function __construct()
    {
        $keyId = config('razorpay.key_id'); // Ensure this is configured in `config/razorpay.php`
        $keySecret = config('razorpay.key_secret');

        $this->api = new Api($keyId, $keySecret);
    }

    public function createOrder($receipt, $amount, $currency, $notes)
    {
        try {
            $order = $this->api->order->create([
                'receipt' => $receipt,
                'amount' => $amount, // Amount in paise
                'currency' => $currency,
                'notes' => $notes,
            ]);

            return $order->toArray();
        } catch (\Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
}

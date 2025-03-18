<?php
$webhookSecret = "12345678@aA"; // Replace with your actual Razorpay Webhook Secret

// Sample Webhook Payload (Use this exact payload in Postman)
$payload = json_encode([
    "event" => "payment.captured",
    "payload" => [
        "payment" => [
            "entity" => [
                "id" => "pay_12345",
                "notes" => [
                    "order_id" => "order_Q7rljUHoUvVvp9"
                ]
            ]
        ]
    ]
]);

// Generate the Razorpay Webhook Signature
$signature = hash_hmac('sha256', $payload, $webhookSecret);

echo "X-Razorpay-Signature: " . $signature . PHP_EOL;

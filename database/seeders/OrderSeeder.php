<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderCustomer;
use App\Models\OrderLog;
use App\Models\OrderCoupon;
use Faker\Factory as Faker;;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Loop to create 10 fake orders
        for ($i = 0; $i <2; $i++) {
            // Create fake Order
            $order = Order::create([
                'order_code' => $faker->unique()->numerify('###'),
                'payment_method' => $faker->randomElement(['COD']),
                'remarks' => $faker->text,
                'tax' => $faker->randomNumber(2),
                // Add other fields...
            ]);

            // Create fake OrderCustomer
            $orderCustomer = OrderCustomer::create([
                'order_id' => $order->id,
                'user_type' => $faker->randomElement(['Guest', 'User']),
                'customer_id' => $faker->numberBetween(1, 100), // Adjust the range based on your customer data
                'billing_address' => $faker->numberBetween(1, 100), // Adjust the range based on your addresses data
                'shipping_address' => $faker->numberBetween(1, 100), // Adjust the range based on your addresses data
                // Add other fields...
            ]);

            // Create fake OrderProduct
            $orderProduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $faker->numberBetween(1, 50), // Adjust the range based on your product data
                'color' => $faker->numberBetween(1, 10), // Adjust the range based on your color data
                'offer_id' => $faker->numberBetween(1, 20), // Adjust the range based on your offer data
                'offer_amount' => $faker->randomFloat(2, 0, 50),
                'is_bogo' => $faker->randomElement([0, 1]),
                'cost' => $faker->randomFloat(2, 10, 100),
                'qty' => $faker->numberBetween(1, 5),
                'shipping_cost' => $faker->randomFloat(2, 0, 20),
                'total' => $faker->randomFloat(2, 50, 200),
                'coupon_value' => $faker->randomFloat(2, 0, 30),
                // Add other fields...
            ]);

            // Create fake OrderLog
            $orderLog = OrderLog::create([
                'order_product_id' => $orderProduct->id,
                'status' => $faker->randomElement(['Pending', 'Processing', 'On Hold', 'Cancelled', 'Completed']),
                // Add other fields...
            ]);

            // Create fake OrderCoupon
            $orderCoupon = OrderCoupon::create([
                'order_id' => $order->id,
                'coupon_id' => $faker->numberBetween(1, 10), // Adjust the range based on your coupon data
                'coupon_value' => $faker->randomFloat(2, 0, 50),
                'status' => $faker->randomElement(['Active', 'Inactive']),
                // Add other fields...
            ]);
        }
    }
}

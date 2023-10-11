<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function orderCustomer()
    {
        return $this->hasOne(OrderCustomer::class);
    }

    public function orderCoupons()
    {
        return $this->hasMany(OrderCoupon::class)->where('status', 'Active');
    }

    public function coupons()
    {
        return $this->hasManyThrough(Coupon::class, OrderCoupon::class, 'order_id', 'id', 'id', 'coupon_id');
    }

    public function orderLogs()
    {
        return $this->hasManyThrough(OrderLog::class, OrderProduct::class);
    }

    public static function order_code()
    {
        $order = Order::count();
        if ($order > 0) {
            $orderExist = Order::latest()->first();
            $count = $orderExist->order_code;
            return str_pad($count + 1, 3, "0", STR_PAD_LEFT);
        } else {
            return '001';
        }
    }

    public static function sendReply($contact)
    {
        $common = SiteInformation::first();
        $contactAddress = ContactAddress::where('status', 'Active')->first();
        $to = $contact->email;
        $to_name = $contact->name;
        Mail::send('mail_templates.contact_reply', array('contact' => $contact), function ($message) use ($to, $to_name, $common, $contactAddress) {
            $message->to($to, $to_name)->subject(config('app.name') . ' - Contact Request Reply');
            $message->from($common->email, $common->email_recipient);
        });
        return true;
    }

    public static function sendOrderStatusMail($order, $status, $productName)
    {
        $common = SiteInformation::first();
        $contactAddress = ContactAddress::where('status', 'Active')->first();
        $to = $order->orderCustomer->shippingAddress->email;
        $to_name = $order->orderCustomer->shippingAddress->first_name . ' ' . $order->orderCustomer->shippingAddress->last_name;
        //mail to customer
        Mail::send('mail_templates.order_status_change', array('code' => $order->order_code, 'name' => $to_name,
            'status' => $status, 'product' => $productName, 'common' => $common), function ($message) use ($to, $to_name, $common, $contactAddress) {
            $message->to($to, $to_name)->subject(config('app.name') . ' - Order Status Changed');
            $message->from($common->email, $common->email_recipient);
            /*if($status=="Cancelled"){
                $message->bcc($common->admin_mail, $common->admin_name);
            }*/
        });
        //mail to /admins
        $emails = explode(',', $common->order_emails);
        foreach ($emails as $email) {

            Mail::send('mail_templates.order_status_change', array('code' => $order->order_code, 'name' => $common->email_recipient,
                'status' => $status, 'product' => $productName, 'common' => $common), function ($message) use ($to, $to_name, $common, $email) {
                    $message->to($email, $common->email_recipient)->subject(config('app.name') . ' - Order Status Changed');
                $message->from($common->email, $common->email_recipient);
                /*if($status=="Cancelled"){
                    $message->bcc($common->admin_mail, $common->admin_name);
                }*/
            });
        }
        return true;
    }

    // to get maximum of minimum_spend of coupon
    public function getMaxCouponsMinimumSpend()
    {
        return $this->coupons()->max('minimum_spend');
    }


    public static function getProductTotal($order_id)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $productSum = [];
            $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
            if ($orderProducts) {
                foreach ($orderProducts as $product) {
                    $productSum[] = $product->total;
                }
            }
            $totalSum = array_sum($productSum);
            return $totalSum;
        } else {
            return "0";
        }
    }

    public static function getCouponSum($order_id)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $couponSum = [];
            $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
            if ($orderProducts) {
                foreach ($orderProducts as $product) {
                    $couponSum[] = $product->coupon_value;
                }
            }
            $totalSum = array_sum($couponSum);
            return $totalSum;
        } else {
            return "0";
        }
    }

    public static function getOrderTotal($order_id)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $productTotal = SELF::getProductTotal($order_id);
            $orderCoupon = SELF::getOrderCoupon($order_id);
            if ($order->tax_type == "Outside") {
                $total_without_coupon = $productTotal + $order->tax_amount + $order->shipping_charge + $order->cod_extra_charge;
            } else {
                $total_without_coupon = $productTotal + $order->shipping_charge + $order->cod_extra_charge;
            }
            $total_after_coupon = $total_without_coupon - $orderCoupon;
            return $total_after_coupon;
        }

    }

    public static function getOrderCoupon($order_id)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $coupon_amount = ($order->orderCoupons) ? $order->orderCoupons->sum('coupon_value') : '0';
        } else {
            $coupon_amount = 0;
        }
        return $coupon_amount;
    }

    public static function getActiveProductCouponValue($order_id)
    {
        $couponValue = [];
        $orderProducts = OrderProduct::where('order_id', $order_id)->get();
        if ($orderProducts) {
            foreach ($orderProducts as $product) {
                $orderStatusData = OrderLog::where('order_product_id', '=', $product->id)->latest()->first();
                if ($orderStatusData->status == "Processing" || $orderStatusData->status == "On Hold" || $orderStatusData->status == "Delivered" || $orderStatusData->status == "Completed") {
                    $couponValue[] = $product->coupon_value;
                }
            }
        }
        return array_sum($couponValue);
    }

    public static function OrderGrandTotal($order_id)
    {
        $order = self::find($order_id);
        $cancelledTotal = Order::getCancelledProductTotal($order_id);
        $orderGrandTotal = Order::getOrderTotal($order_id);
        $siteInformation = SiteInformation::first();
        $total = $cancelledTotal['total'] - $cancelledTotal['couponCharge'];
        if ($order->tax_type == "Outside") {
            $returnAmount = $total + $cancelledTotal['taxAmount'] + $cancelledTotal['shippingCharge'] + $cancelledTotal['otherCouponCharge'];
        } else {
            $returnAmount = $total + $cancelledTotal['shippingCharge'] + $cancelledTotal['otherCouponCharge'];
        }
        $orderGrandTotal = $orderGrandTotal - $returnAmount;
        $returnData['orderGrandTotal'] = $orderGrandTotal;
        $returnData['returnAmount'] = $returnAmount;
        return $returnData;
    }

    public static function getCancelledProductTotal($order_id)
    {
        $order = self::find($order_id);
        $returnData = [];
        if ($order) {
            $siteInformation = SiteInformation::first();
            $productSum = $couponAmount = [];
            $orderProducts = OrderProduct::where('order_id', $order->id)->get();
            if ($orderProducts) {
                foreach ($orderProducts as $product) {
                    $orderStatusData = OrderLog::where('order_product_id', $product->id)->latest()->first();
                    if ($orderStatusData->status == "Cancelled" || $orderStatusData->status == "Refunded" || $orderStatusData->status == "Failed") {
                        $productSum[] = $product->total;
                        $couponAmount[] = $product->coupon_value;
                    }
                }
            }
            $returnData['total'] = array_sum($productSum);
            if (count($orderProducts) == count($productSum)) {
                $returnData['shippingCharge'] = $order->shipping_charge;
            } else {
                $returnData['shippingCharge'] = 0;
            }
            $totalSum = (array_sum($productSum) - array_sum($couponAmount));
            if ($totalSum > 0 && $order->tax_type == "Outside") {
                $returnData['taxAmount'] = $totalSum * $order->tax / 100;
            } else {
                $returnData['taxAmount'] = 0;
            }
            $returnData['couponCharge'] = array_sum($couponAmount);
            $returnData['otherCouponCharge'] = '0.00';
            if ($order->orderCoupons) {
                $couponStatus = SELF::couponStatus($order_id);
                foreach ($order->orderCoupons as $orderCoupon) {
                    if ($orderCoupon->coupon->minimum_spend != '0.00' && $couponStatus == "disabled") {
                        $activeCouponValues = SELF::getActiveProductCouponValue($order_id);
                        $returnData['otherCouponCharge'] = $activeCouponValues;
                    }
                }
            }
        } else {
            return "0";
        }
        return $returnData;
    }

    public static function getActiveProductTotal($order_id)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $productSum = [];
            $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
            if ($orderProducts) {
                foreach ($orderProducts as $product) {
                    $orderStatusData = OrderLog::where('order_product_id', '=', $product->id)->latest()->first();
                    if ($orderStatusData->status == "Processing" || $orderStatusData->status == "On Hold" || $orderStatusData->status == "Delivery" || $orderStatusData->status == "Completed") {
                        $productSum[] = $product->total;
                    }
                }
            }
            $totalSum = array_sum($productSum);
            return $totalSum;
        } else {
            return "0";
        }
    }

    public static function getShippingGiftCharge($order_id, $shippingAmount)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $productIds = [];
            $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
            if ($orderProducts) {
                foreach ($orderProducts as $product) {
                    $orderStatusData = OrderLog::where('order_product_id', '=', $product->id)->latest()->first();
                    if ($orderStatusData->status == "Failed" || $orderStatusData->status == "Cancelled" || $orderStatusData->status == "Refunded") {
                        $productIds[] = $product->id;
                    }
                }
            }
            if (count($orderProducts) == count($productIds)) {
                $shippingAmount = 0;
            }
            $returnData['shippingAmount'] = $shippingAmount;
            return $returnData;
        }
    }
    public static function getOrderCurrentTotal($order_id)
    {
        $orderTotal = Order::getProductTotal($order_id);
        $cancelledTotal = Order::getCancelledProductTotal($order_id);
        return $orderTotal - $cancelledTotal['total'];
    }
    public static function couponStatus($order_id)
    {
        $order = SELF::find($order_id);
        if ($order) {
            $orderSubTotal = Order::getActiveProductTotal($order_id);
            $cartProducts = OrderProduct::where('order_id', '=', $order_id)->get();
            $coupon_value = 0;
            $status = "enabled";
            //todo: multiple coupon changes
            $orderCoupon = OrderCoupon::where('order_id', '=', $order_id)->first();
            if ($orderCoupon != NULL && $orderSubTotal > 0) {
                $coupon = Coupon::where('id', '=', $orderCoupon->coupon_id)->first();
                $valid = $second_valid = $third_valid = $fourth_valid = $minimum_valid = $maximum_valid = true;
                if ($coupon->minimum_spend != '0.00') {
                    if ($coupon->minimum_spend <= $orderSubTotal) {
                        $minimum_valid = true;
                    } else {
                        $minimum_valid = false;
                    }
                }
                if ($coupon->maximum_spend != '0.00') {
                    if ($coupon->maximum_spend >= $orderSubTotal) {
                        $maximum_valid = true;
                    } else {
                        $maximum_valid = false;
                    }
                }
                if ($minimum_valid == true && $maximum_valid == true) {
                    $includedCategories = $includedProducts = [];
                    if ($coupon->included_categories != NULL) {
                        $includedCategories = explode(',', $coupon->included_categories);
                    }
                    if ($coupon->included_products != NULL) {
                        $includedProducts = explode(',', $coupon->included_products);
                    }
                    $excludedProductList = $productCharge = [];
                    $includedProductCost = $excludedProductCost = [];
                    foreach ($cartProducts as $product) {
                        $orderStatusData = OrderLog::where('order_product_id', '=', $product->id)->latest()->first();
                        if ($orderStatusData->status == "Processing" || $orderStatusData->status == "On Hold" || $orderStatusData->status == "Delivery" || $orderStatusData->status == "Completed") {
                            $productData = Product::find($product->product_id);
                            if (count($includedProducts) > 0) {
                                if (in_array($productData->product_id, $includedProducts)) {
                                    $includedProductList[] = $product->product_id;
                                    if ($coupon->applicable_only_if_sale_price == "Yes") {
                                        $includedProductCost[] = $product->total;
                                    } else {
                                        if ($product->offer_id == 0) {
                                            $includedProductCost[] = $product->total;
                                        }
                                    }
                                } else {
                                    $excludedProductList[] = $product->id;
                                }
                            } else {
                                if ($coupon->applicable_only_if_sale_price == "Yes") {
                                    $includedProductCost[] = $product->total;
                                } else {
                                    if ($product->offer_id == 0) {
                                        $includedProductCost[] = $product->total;
                                    }
                                }
                            }
                        }
                    }
                    if ($orderSubTotal != 0) {
                        if (!empty($includedProducts)) {
                            if (count($excludedProductList) > 0) {
                                $third_valid = false;
                            }
                        }
                        if ($third_valid == false) {
                            if ($coupon->type == "Fixed") {
                                $status = 'disabled';
                                $final_amount_after_coupon = $orderSubTotal - $coupon->coupon_value;
                            } else {
                                if (count($includedProductCost) > 0) {
                                    $coupon_value = array_sum($includedProductCost) * $coupon->coupon_value / 100;
                                } else {
                                    $coupon_value = $orderSubTotal * $coupon->coupon_value / 100;
                                }
                                $coupon_value = $coupon_value * $order->currency_charge;
                                $final_amount_after_coupon = $orderSubTotal - $coupon_value;
                                $fourth_valid = true;
                            }
                        } else {
                            if ($coupon->type == "Fixed") {
                                $coupon_value = $coupon->coupon_value;
                                $coupon_value = $coupon_value * $order->currency_charge;
                                if (count($includedProductCost) > 0) {
                                    $final_amount_after_coupon = array_sum($includedProductCost) - $coupon_value;
                                } else {
                                    $final_amount_after_coupon = $orderSubTotal - $coupon_value;
                                }
                            } else {
                                $coupon_value = $coupon->coupon_value * $order->currency_charge;
                                if (count($includedProductCost) > 0) {
                                    $coupon_value = array_sum($includedProductCost) * $coupon_value / 100;
                                } else {
                                    $coupon_value = $orderSubTotal * $coupon_value / 100;
                                }
                                $final_amount_after_coupon = $orderSubTotal - $coupon_value;
                            }
                            $fourth_valid = true;
                        }
                        if ($fourth_valid == true) {
                            $tax_amount = $final_amount_after_coupon * $order->tax / 100;
                        } else {
                            $status = "disabled";
                        }
                    } else {
                        $status = "disabled";
                    }
                } else {
                    $status = "disabled";
                }
            } else {
                $status = "disabled";
            }
            return $status;
        }
    }

    /****************************** Active functions ends *****************************/

    public static function OrderCountByStatus($status)
    {
        $orders = Order::get();
        if ($orders) {
            $ordersList = [];
            $orderStatus = [];
            foreach ($orders as $order) {
                $orderProducts = OrderProduct::where('order_id', $order->id)->get();
                if ($orderProducts) {
                    foreach ($orderProducts as $product) {
                        $orderStatusData = OrderLog::where('order_product_id', $product->id)->orderBy('id', 'DESC')->first();
                        if ($orderStatusData != NULL) {
                            if ($orderStatusData->status == $status) {
                                $orderStatus[$order->id] = $orderStatusData->status;
                            }
                        }
                    }
                }
            }
            return count($orderStatus);
        }
    }

    public static function OrderCountByStatusOnHold($status = NULL)
    {
        $orders = Order::get();
        if ($orders) {
            $ordersList = [];
            $orderStatus = [];
            foreach ($orders as $order) {
                $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
                if ($orderProducts) {
                    foreach ($orderProducts as $product) {
                        $orderStatusData = OrderLog::where('order_product_id', '=', $product->id)->latest()->first();
                        if ($orderStatusData != NULL && $order->payment_method != 'COD') {
                            if ($orderStatusData->status == $status) {
                                $orderStatus[$order->id] = $orderStatusData->status;
                            }
                        }
                    }
                }
            }
            return count($orderStatus);
        }
    }

    public static function getOrderByStatus($status, $start = NULL, $end = NULL)
    {
        if ($start != NULL && $end != NULL) {
            $orders = Order::whereBetween('created_at', [$start, $end])->get();
        } else {
            $orders = Order::get();
        }
        if ($orders) {
            $ordersList = [];
            foreach ($orders as $order) {
                $orderProducts = OrderProduct::where('order_id', $order->id)->get();
                if ($orderProducts) {
                    foreach ($orderProducts as $product) {
                        $orderStatusData = OrderLog::where('order_product_id', $product->id)->latest()->first();
                        if ($orderStatusData != NULL) {
                            if ($orderStatusData->status == $status) {
                                $ordersList[] = $order->id;
                            }
                        }
                    }
                }
            }
            $returnData = [];
            foreach ($ordersList as $order) {
                $orderData = SELF::find($order);
                $returnData[$order]['order'] = $orderData;
                $returnData[$order]['OrderProducts'] = OrderProduct::where('order_id', $order)->count();
                $returnData[$order]['OrderCustomer'] = OrderCustomer::where('order_id', $order)->first();
                $orderGrandTotal = Order::OrderGrandTotal($order);
                $sub_total = $orderGrandTotal['orderGrandTotal'];
                $coupon_charge = Order::getActiveProductCouponValue($order);
                $returnData[$order]['sub_total'] = $sub_total + $coupon_charge;
                $returnData[$order]['total_price'] = $sub_total;
            }
            return $returnData;
        }
    }

    public static function getOrderByPaymentMethod($type, $start = NULL, $end = NULL)
    {
        if ($type == "COD") {
            if ($start != NULL && $end != NULL) {
                $orders = SELF::where('payment_method', '=', $type)->whereBetween('created_at', [$start, $end])->get();
            } else {
                $orders = SELF::where('payment_method', '=', $type)->get();
            }
        } else {
            if ($start != NULL && $end != NULL) {
                $orders = SELF::where('payment_method', '!=', 'COD')->whereBetween('created_at', [$start, $end])->get();
            } else {
                $orders = SELF::where('payment_method', '!=', 'COD')->get();
            }
        }
        $returnData = [];
        //dd($orders);
        foreach ($orders as $order) {
            $orderData = SELF::find($order->id);
            $returnData[$order->id]['order'] = $orderData;
            $returnData[$order->id]['OrderProducts'] = OrderProduct::where('order_id', '=', $order->id)->count();
            $returnData[$order->id]['OrderCustomer'] = OrderCustomer::where('order_id', '=', $order->id)->first();
            $orderGrandTotal = Order::OrderGrandTotal($order->id);
            $sub_total = $orderGrandTotal['orderGrandTotal'];
            $coupon_charge = Order::getActiveProductCouponValue($order->id);
            $returnData[$order->id]['sub_total'] = $sub_total + $coupon_charge;
            $returnData[$order->id]['total_price'] = $sub_total;
        }
        return $returnData;
    }

    public static function getOrderByCoupons($start = NULL, $end = NULL)
    {
        if ($start != NULL && $end != NULL) {
            $orders = Order::whereBetween('created_at', [$start, $end])->get();
        } else {
            $orders = Order::get();
        }
        $returnData = [];
        foreach ($orders as $order) {
            $orderCoupon = OrderCoupon::with('coupon')->where([['order_id', '=', $order->id], ['status', '=', 'Active']])->first();
            if ($orderCoupon != NULL) {
                $orderData = SELF::find($order->id);
                $returnData[$order->id]['coupon'] = $orderCoupon;
                $returnData[$order->id]['order'] = $orderData;
                $returnData[$order->id]['OrderProducts'] = OrderProduct::where('order_id', '=', $order->id)->count();
                $returnData[$order->id]['OrderCustomer'] = OrderCustomer::where('order_id', '=', $order->id)->first();
                $orderGrandTotal = Order::OrderGrandTotal($order->id);
                $sub_total = $orderGrandTotal['orderGrandTotal'];
                $coupon_charge = Order::getActiveProductCouponValue($order->id);
                $returnData[$order->id]['sub_total'] = $sub_total + $coupon_charge;
                $returnData[$order->id]['total_price'] = $sub_total;
            }
        }
        return $returnData;
    }

    public static function boxValuesForgetOrderByCoupons($start = NULL, $end = NULL)
    {
        if ($start != NULL && $end != NULL) {
            $orders = Order::whereBetween('created_at', [$start, $end])->get();
        } else {
            $orders = Order::get();
        }
        $boxValues = [];
        $orderTotal = $returnData['total_price'] = $returnData['coupon'] = $products = [];
        foreach ($orders as $order) {
            $orderCoupon = OrderCoupon::with('coupon')->where([['order_id', '=', $order->id], ['status', '=', 'Active']])->first();
            if ($orderCoupon != NULL) {
                $orderData = SELF::find($order->id);
                $products[] = OrderProduct::where('order_id', $order->id)->count();
                $orderGrandTotal = Order::OrderGrandTotal($order->id);
                $returnData['total_price'][] = $orderGrandTotal['orderGrandTotal'];
                $returnData['coupon'][] = Order::getActiveProductCouponValue($order->id);
            }
        }
        $boxValues['totalProducts'] = count($products);
        $boxValues['totalOrders'] = count($orders);
        $boxValues['totalAmount'] = array_sum($returnData['total_price']);
        $boxValues['totalCoupon'] = array_sum($returnData['coupon']);
        return $boxValues;
    }

    public static function getOrderByOffers($order_id = NULL)
    {
        if ($order_id == NULL) {
            $orderProducts = OrderProduct::with('orderData')->where('offer_id', '!=', '0')->get();
            $returnData['orderList'] = $orderProducts;
        } else {
            $firstProduct = OrderProduct::where('order_id', $order_id)->first();
            $returnData = [];
            $orderData = Order::find($firstProduct->order_id);
            $returnData['orderData'] = $orderData;
            $products = [];
            foreach (OrderProduct::with('productData')->where('order_id', $orderData->id)->get() as $product) {
                if ($product->offer_id != 0) {
                    $returnData['products'][] = $product;
                }
            }
        }
        return $returnData;
    }

    public static function getCustomerOrder($customer_id, $order_status)
    {
        $returnData = $ordersList = [];
        $orders = OrderCustomer::where('customer_id', '=', $customer_id)->get();
        foreach ($orders as $order) {
            $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
            if ($orderProducts) {
                $orderStatus = [];
                foreach ($orderProducts as $product) {
                    $orderStatusData = OrderLog::where([['order_product_id', '=', $product->id], ['status', '=', $order_status]])->latest()->first();
                    if ($orderStatusData != NULL) {
                        if ($orderStatusData->status == $order_status) {
                            $orderStatus[] = 1;
                        }
                    }
                }
                if (count($orderProducts) == count($orderStatus)) {
                    $ordersList[] = $order->id;
                }
            }
        }
        foreach ($ordersList as $order) {
            $orderData = SELF::find($order);
            $returnData[$order]['order'] = $orderData;
            $returnData[$order]['OrderProducts'] = OrderProduct::where('order_id', $order)->count();
            $subTotal = Order::getActiveProductTotal($order);
            $orderCoupons = $orderData->orderCoupons;
            if ($orderCoupons != NULL) {
                $coupon_charge = $orderCoupons->sum('coupon_value');
            } else {
                $coupon_charge = '0.00';
            }
            $orderGrandTotal = Order::OrderGrandTotal($order);
            $returnData[$order]['coupons'] = $orderCoupons;
            $returnData[$order]['total_price'] = $orderGrandTotal['orderGrandTotal'];
            $returnData[$order]['coupon'] = Order::getActiveProductCouponValue($order);
        }
        return $returnData;
    }

    public static function SendCartNotifyMail($cartData, $customerData, $request = NULL)
    {
        $common = SiteInformation::first();
        $contactAddress = ContactAddress::where('status', 'Active')->first();
        if ($request != NULL) {
            $defaultTemplate['title'] = $request->title;
            $defaultTemplate['description'] = $request->description;
            $type = "1";
        } else {
            $defaultTemplate = MailTemplate::where('is_default', 'Yes')->first();
            $type = "2";
        }
        $to = $customerData->email;
        $to_name = $customerData->first_name . ' ' . $customerData->last_name;
        Mail::send('mail_template.notify_cart', array('name' => $to_name, 'common' => $common, 'cartData' => $cartData, 'defaultTemplate' => $defaultTemplate, 'type' => $type), function ($message) use ($to, $to_name, $common, $contactAddress) {
            $message->to($to, $to_name)->subject(config('app.name') . ' - Cart Notify');
            $message->from($common->email, $common->email_receipient_name);
        });
        return true;
    }

    public static function boxValues($start = NULL, $end = NULL)
    {
        if ($start != NULL && $end != NULL) {
            $orders = Order::whereBetween('created_at', [$start, $end])->get();
            $totalProducts = OrderProduct::whereIn('order_id', $orders->pluck('id')->toArray())->count();
        } else {
            $orders = Order::get();
            $totalProducts = OrderProduct::count();
        }
        $boxValues = [];
        $orderTotal = $returnData['total_price'] = $returnData['coupon'] = $totalProducts = [];
        foreach ($orders as $order) {
            $totalProducts[] = OrderProduct::where('order_id', $order->id)->count();
            $orderGrandTotal = Order::OrderGrandTotal($order->id);
            $returnData['total_price'][] = $orderGrandTotal['orderGrandTotal'];
            $returnData['coupon'][] = Order::getActiveProductCouponValue($order->id);
        }
        // echo array_sum($returnData['total_price'])."=>".array_sum($returnData['coupon']);die;
        $boxValues['totalProducts'] = $totalProducts;
        $boxValues['totalOrders'] = count($orders);
        $boxValues['totalAmount'] = array_sum($returnData['total_price']);
        $boxValues['totalCoupon'] = array_sum($returnData['coupon']);
        return $boxValues;
    }


    public static function boxValuesForgetOrderByStatus($status, $start = NULL, $end = NULL)
    {
        if ($start != NULL && $end != NULL) {
            $orders = Order::whereBetween('created_at', [$start, $end])->get();
        } else {
            $orders = Order::get();
        }
        $ordersList = $boxValues = [];
        $totalProducts = $totalAmount = $couponTotal = 0;
        if ($orders) {
            foreach ($orders as $order) {
                $orderProducts = OrderProduct::where('order_id', $order->id)->get();
                if ($orderProducts) {
                    foreach ($orderProducts as $product) {
                        $orderStatusData = OrderLog::where('order_product_id', $product->id)->latest()->first();
                        if ($orderStatusData != NULL) {
                            if ($orderStatusData->status == $status) {
                                $ordersList[] = $order->id;
                            }
                        }
                    }
                }
            }
            if ($ordersList != NUll) {
                $ordersList = array_unique($ordersList);
                $totalProducts = OrderProduct::whereIn('order_id', $ordersList)->count();
                $orderTotal = $returnData['total_price'] = $returnData['coupon'] = [];
                foreach ($ordersList as $order) {
                    $orderGrandTotal = Order::OrderGrandTotal($order);
                    $returnData['total_price'][] = $orderGrandTotal['orderGrandTotal'];
                    $returnData['coupon'][] = Order::getActiveProductCouponValue($order);
                }
                $totalAmount = array_sum($returnData['total_price']);
                $couponTotal = array_sum($returnData['coupon']);
            }
            $boxValues['totalProducts'] = $totalProducts;
            $boxValues['totalOrders'] = count($ordersList);
            $boxValues['totalAmount'] = $totalAmount;
            $boxValues['totalCoupon'] = $couponTotal;
            return $boxValues;
        }
    }

    public static function boxValuesForgetOrderByPaymentMethod($type, $start = NULL, $end = NULL)
    {
        if ($type == "COD") {
            if ($start != NULL && $end != NULL) {
                $orders = SELF::where('payment_method', '=', $type)->whereBetween('created_at', [$start, $end])->get();
            } else {
                $orders = SELF::where('payment_method', '=', $type)->get();
            }
        } else {
            if ($start != NULL && $end != NULL) {
                $orders = SELF::where('payment_method', '!=', 'COD')->whereBetween('created_at', [$start, $end])->get();
            } else {
                $orders = SELF::where('payment_method', '!=', 'COD')->get();
            }
        }
        $boxValues = [];
        $orderTotal = $returnData['total_price'] = $returnData['coupon'] = $products = [];
        foreach ($orders as $order) {
            $products[] = OrderProduct::where('order_id', $order->id)->count();
            $orderGrandTotal = Order::OrderGrandTotal($order->id);
            $returnData['total_price'][] = $orderGrandTotal['orderGrandTotal'];
            $returnData['coupon'][] = Order::getActiveProductCouponValue($order->id);
        }
        $boxValues['totalProducts'] = count($products);
        $boxValues['totalOrders'] = count($orders);
        $boxValues['totalAmount'] = array_sum($returnData['total_price']);
        $boxValues['totalCoupon'] = array_sum($returnData['coupon']);
        return $boxValues;
    }

    public static function getStatus($status)
    {
        if ($status == "Processing" || $status == "Delivery" || $status == "Completed") {
            $bg_color = 'btn-success';
        } elseif ($status == "On Hold") {
            $bg_color = 'btn-warning';
        } else {
            $bg_color = 'btn-danger';
        }
        return '<button type="button" class="btn ' . $bg_color . ' btn-block btn-xs">' . $status . '</button>';
    }

    public static function getDetailedOrders($date_range = NULL, $status = NULL, $customer = NULL, $product = NULL, $coupon = NULL)
    {
        $dateExploded = explode('-', $date_range);
        $startDate = date("Y-m-d", strtotime($dateExploded[0]));
        $endDate = date("Y-m-d", strtotime($dateExploded[1]));
        $start = $startDate . ' 00:00:00';
        $end = $endDate . ' 23:59:59';
        $orders = SELF::whereBetween('created_at', [$start, $end])->get();
        if ($status != NULL) {
            $ordersList = [];
            foreach ($orders as $order) {
                $orderProducts = OrderProduct::where('order_id', '=', $order->id)->get();
                if ($orderProducts) {
                    foreach ($orderProducts as $products) {
                        $orderStatusData = OrderLog::where('order_product_id', '=', $products->id)->latest()->first();
                        if ($orderStatusData != NULL) {
                            if ($orderStatusData->status == $status) {
                                $ordersList[] = $order->id;
                            }
                        }
                    }
                }
            }
            $orders = Order::whereIn('id', $ordersList)->get();
        }
        if ($customer != NULL) {
            $orderIds = $orders->pluck('id')->toArray();
            $customerOrders = OrderCustomer::where('customer_id', '=', $customer)->whereIn('order_id', $orderIds)->get();
            $orders = Order::whereIn('id', $customerOrders->pluck('order_id')->toArray())->get();
        }
        if ($product != NULL) {
            DB::enableQueryLog();
            $orderIds = $orders->pluck('id')->toArray();//dd($orderIds);
            $productOrders = Product::where('id', '=', $product)->first();
            $variants = Product::where('similar_product_id', '=', $product)->get();
            $productOrders = OrderProduct::whereIn('product_id', $variants->pluck('id')->toArray())->whereIn('order_id', $orderIds)->get();
            $quries = DB::getQueryLog();
            //dd($quries);
            //dd($productOrders);
            $orders = Order::whereIn('id', $productOrders->pluck('order_id')->toArray())->get();
        }
        if ($coupon != NULL) {
            $orderIds = $orders->pluck('id')->toArray();
            $orderCoupon = OrderCoupon::whereIn('order_id', $orderIds)->where([['status', '=', 'Active'], ['coupon_id', '=', $coupon]])->get();
            $orders = Order::whereIn('id', $orderCoupon->pluck('order_id')->toArray())->get();
        }
        //dd($orders);
        return $orders;
    }

    public static function getDetailedOrdersBoxValues($date_range = NULL, $status = NULL, $customer = NULL, $product = NULL, $coupon = NULL)
    {
        $orders = SELF::getDetailedOrders($date_range, $status, $customer, $product, $coupon);
        $boxValues = [];
        $totalProducts = OrderProduct::whereIn('order_id', $orders->pluck('id')->toArray())->count();
        $orderTotal = $returnData['total_price'] = $returnData['coupon'] = [];
        foreach ($orders as $order) {
            $products[] = OrderProduct::where('order_id', $order->id)->count();
            $orderGrandTotal = Order::OrderGrandTotal($order->id);
            $returnData['total_price'][] = $orderGrandTotal['orderGrandTotal'];
            $returnData['coupon'][] = Order::getActiveProductCouponValue($order->id);
        }
        $boxValues['totalProducts'] = $totalProducts;
        $boxValues['totalOrders'] = count($orders);
        $boxValues['totalAmount'] = array_sum($returnData['total_price']);
        $boxValues['totalCoupon'] = array_sum($returnData['coupon']);
        return $boxValues;
    }

    public static function SalesByDate($start, $end, $flag)
    {
        $orders = Order::whereBetween('created_at', [$start, $end])->get();
        $totalProducts = OrderProduct::whereIn('order_id', $orders->pluck('id')->toArray())->count();
        $boxValues = [];
        $orderTotal = $returnData['total_price'] = $returnData['coupon'] = [];
        foreach ($orders as $order) {
            $productCost = [];
            $orderData = Order::find($order->id);
            foreach (OrderProduct::where('order_id', $order->id)->get() as $product) {
                $orderStatusData = OrderLog::where('order_product_id', $product->id)->orderBy('id', 'DESC')->first();
                if ($orderStatusData->status != "Cancelled" && $orderStatusData->status != "Failed" && $orderStatusData->status != "Refunded" && $orderStatusData->status != "Pending") {
                    $productCost[] = $product->total;
                }
            }
            if ($order->orderCoupons) {
                $returnData['coupon'][] = $order->orderCoupons->sum('coupon_value');
            }
            $sub_total = array_sum($productCost) + $orderData->cod_extra_charge + $orderData->tax_amount + $orderData->shipping_charge;
            $returnData['total_price'][] = $sub_total;
        }
        $boxValues['totalAmount'] = array_sum($returnData['total_price']);
        $boxValues['totalCoupon'] = array_sum($returnData['coupon']);
        if ($flag == 1) {
            return $boxValues['totalAmount'] - $boxValues['totalCoupon'];
        } else {
            return $boxValues['totalAmount'];
        }
    }

    public static function ProductOrderCustomerCount($start = NULL, $end = NULL)
    {
        $returnData = [];
        $orders = 0;
        if ($start != NULL && $end != NULL) {
            $orders = Order::whereBetween('created_at', [$start, $end])->count();
            $products = Product::whereBetween('created_at', [$start, $end])->where('status', 'Active')->count();
            $customers = Customer::whereHas('user', function ($query) {
                return $query->active();
            })->whereBetween('created_at', [$start, $end])->count();
        } else {
            $products = Product::where('status', 'Active')->count();
            $customers = Customer::whereHas('user', function ($query) {
                return $query->active();
            })->count();
        }
        $returnData['orderCount'] = $orders;
        $returnData['productCount'] = $products;
        $returnData['customerCount'] = $customers;
        return $returnData;
    }

    public static function ChartInfo($start, $end)
    {
        $orders = Order::whereBetween('created_at', [$start, $end])->get();
        $totalProducts = OrderProduct::whereIn('order_id', $orders->pluck('id')->toArray())->count();
        $boxValues = [];
        $chartInfo = $returnData['total_price'] = $returnData['coupon'] = [];
        foreach ($orders as $order) {
            $coupon_charge = 0;
            $productCost = [];
            foreach (OrderProduct::where('order_id', $order->id)->get() as $product) {
                $orderStatusData = OrderLog::where('order_product_id', '=', $product->id)->latest()->first();
                if ($orderStatusData->status != "Cancelled" || $orderStatusData->status != "Failed" || $orderStatusData->status != "Refunded") {
                    $productCost[] = $product->total;
                }
            }
            if ($order->orderCoupons) {
                $coupon_charge = $order->orderCoupons->sum('coupon_value');
            }
            $sub_total[date("d-M", strtotime($order->created_at))]['net_amount'][] = array_sum($productCost) + $order->gift_wrapper_charge + $order->tax_amount + $order->shipping_charge;
            $sub_total[date("d-M", strtotime($order->created_at))]['coupon_amount'] = $coupon_charge;
            $chartInfo[date("d-M", strtotime($order->created_at))] = $sub_total[date("d-M", strtotime($order->created_at))];
        }
        $finalResult = [];
        foreach ($chartInfo as $chart => $info) {
            $finalResult[$chart] = array_sum($info['net_amount']) - $info['coupon_amount'];
        }
        //dd($finalResult);
        $resultData = [];
        for ($i = 1; $i < date('d'); $i++) {
            $resultData[sprintf("%02d", $i) . '-' . date('M')] = '0.00';
        }
        $mergeResult = array_merge($resultData, $finalResult);
        /*dd($mergeResult);
        foreach($mergeResult as $info=>$value){
            echo '["'.$info.'","'.$value.'"]'."<br/>";
        }die;*/
        //dd($mergeResult);
        return $mergeResult;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderCoupon extends Model
{
    use HasFactory, SoftDeletes;

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
}

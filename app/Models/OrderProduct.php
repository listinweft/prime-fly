<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    public function orderData()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function colorData()
    {
        return $this->belongsTo(Color::class, 'color');
    }

    public function productData()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

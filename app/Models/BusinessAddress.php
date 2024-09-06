<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessAddress extends Model
{
    use HasFactory;

    protected $table = 'business_address';

    // Allow all fields to be nullable
    protected $fillable = [
        'customer_id', 'address', 'country', 'state', 'city', 'pincode','passport_number', 'gst_number',
    ];

    // The customer relationship (assuming a BusinessAddress belongs to a customer)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

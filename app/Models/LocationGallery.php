<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationGallery extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * relationships with the Product model
     * a product gallery is created for a Product
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}

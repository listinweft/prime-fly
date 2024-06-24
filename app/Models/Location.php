<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function galleries()
    {
        return $this->hasMany(LocationGallery::class);
    }

    public function activeGalleries()
    {
        return $this->hasMany(LocationGallery::class)->active();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationBanner extends Model
{
    use HasFactory;
    protected $table = 'location_banner';

    protected $fillable = [
        'title',
        'description',
        'image',
        'image_webp',
        'mobile_banner',
        'mobile_banner_webp',
    ];
}

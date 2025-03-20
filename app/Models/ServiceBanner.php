<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBanner extends Model
{
    use HasFactory;

    protected $table = 'service_banner';

    protected $fillable = [
        'title',
        'description',
        'image',
        'image_webp',
        'mobile_banner',
        'mobile_banner_webp',
    ];
}

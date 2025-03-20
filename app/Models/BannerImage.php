<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;
    protected $table = 'banner_image'; // Specify the table name

    protected $fillable = [
        'title',
        'image',
        'image_webp',
        'blog_image',
        'blog_image_webp',
        'faq_image',
        'faq_image_webp',
        'location',
        'phone',
        'email',
    ];
}

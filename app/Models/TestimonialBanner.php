<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialBanner extends Model
{
    use HasFactory;

    protected $table = 'testimonial_banner';

    protected $fillable = [
        'title',
        'description',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogBanner extends Model
{
    use HasFactory;
    protected $table = 'blog_banner'; // Specify the table name

    protected $fillable = [
        'title',
       'description'
    ];
}

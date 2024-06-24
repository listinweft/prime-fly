<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    use HasFactory;
    protected $table = 'categorygalleries';

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }


    public function gallerydata()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

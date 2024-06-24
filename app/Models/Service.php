<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    
    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    public function getProductCategoriesAttribute()
{
    $categoryId = $this->category_id;
    return Category::whereIn('id', explode(',', $categoryId))->get();
}


}

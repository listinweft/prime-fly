<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * Scope a query to find home display items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHomeDisplay($query)
    {
        return $query->where('display_to_home', 'Yes');
    }

    /**
     * Scope a query to find featured items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 'Yes');
    }

    /**
     * Scope a query to find product with given short url.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShortUrl($query, $hort_url)
    {
        return $query->where('short_url', $hort_url);
    }

    /**
     * Get the products categories.
     *
     * @return string
     */
    public function getProductCategoriesAttribute()
    {
        $categoryId = $this->category_id;
        return Category::whereIn('id', explode(',', $categoryId))->get();
    }

    /**
     * Get the products sub categories.
     *
     * @return string
     */
    public function getProductSubCategoriesAttribute()
    {
        $subCategoryId = $this->sub_category_id;
        return Category::whereIn('id', explode(',', $subCategoryId))->get();
    }

    public function getProductTagsAttribute()
    {
        $tagId = $this->tag_id;
        return Tag::whereIn('id', explode(',', $tagId))->get();
    }
    /**
     * relationships with the Brand model
     * a product has a Brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * relationships with the Color model
     * a product may have a Color
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * relationships with the MeasurementUnit model
     * a product has a MeasurementUnit
     */
    public function measurementUnit()
    {
        return $this->belongsTo(MeasurementUnit::class);
    }

    /**
     * relationships with the Product Gallery model
     * a product has many gallery images
     */
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    /**
     * relationships with the Product Gallery model
     * a product has many gallery images
     */
    public function activeGalleries()
    {
        return $this->hasMany(ProductGallery::class)->active();
    }

    public function activeKeyfeatures()
    {
        return $this->hasMany(ProductKeyFeature::class)->active();
    }


    /**
     * relationships with the Product overview model
     * a product has many overviews
     */
    public function activeOverviews()
    {
        return $this->hasMany(ProductOverview::class)->active();
    }

    /**
     * relationships with the Product specification model
     * a product has many specifications
     */
    public function activeSpecifications()
    {
        return $this->hasMany(ProductSpecification::class)->active();
    }

    /**
     * relationships with the review model
     * a product has many review
     */
    public function activeReviews()
    {
        return $this->hasMany(ProductReview::class)->active();
    }

    /**
     * relationships with the offer model
     * a product has one active offer
     */
    public function activeOffer()
    {
        return $this->hasOne(Offer::class)->active();
    }

}

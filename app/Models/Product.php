<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
       'partner_id',
       'category_id',
       'image', 
       'name', 
       'description', 
       'price', 
       'available', 
       'note', 
       'campaign_id', 
    ];

    protected $casts = [
        'price' => 'float',
    ];

    protected $with = [ 'extras', 'category' ];

    /**
     * Get the extras for the product.
     */
    public function extras()
    {
        return $this->hasMany(Extra::class);
    }

    /**
     * Get the partner that owns the Partner profile.
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the product category
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get the Side Product (eg.: Side Dish )
     */
    public function sides()
    {
        return $this->belongsToMany(Side::class, 'product_side');
    }

    /**
     * Get Sauces
     */
    public function sauces()
    {
        return $this->belongsToMany(Sauce::class, 'product_sauce');
    }

    /**
     * Get Allergens
     */
    public function allergens()
    {
        return $this->belongsToMany(Allergen::class, 'allergen_product');
    }

    /**
     * Get featured
     */
    public function featured()
    {
        return $this->hasOne(Featured::class);
    }
}

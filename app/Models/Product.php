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
    public function side()
    {
        return $this->hasMany(Side::class);
    }
}

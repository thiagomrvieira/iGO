<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'active',
    ];

    /**
     * Get the product that owns the Side Dish.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all Side Dishes that owns the Product.
     */
    public function side()
    {
        // return $this->belongsToMany(Side::class, 'product_side', 'product_id', 'side_id');
        return $this->belongsToMany(Side::class);
    }

}

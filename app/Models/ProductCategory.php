<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $fillable = [
       'id',
       'partner_category_id',
       'name',
       'slug',
       'active'
    ];

    /**
     * Get the products that the category has
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

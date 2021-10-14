<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'address_id',
        'campaign_id',
        'order_status_type_id',
        'tax_name',
        'tax_number',
        'amount',
        'deliver_at', 
    ];

    /**
     * Get the order's items/products.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }

    /**
     * Get the items/products in the cart
     */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    
}

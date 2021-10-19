<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'client_id',
        'product_id',
        'review', 
        'rate', 
    ];

    /**
     * Get the order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the the user that rated the order
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the product rated
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

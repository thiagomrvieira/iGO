<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartSide extends Model
{
    use HasFactory;
    protected $table = 'cart_side';
    protected $fillable = [
        'cart_id',
        'side_id',
        'quantity',
    ];

    /**
     * Get the Cart associated with the extra.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the Side associated with the cart.
     */
    public function side()
    {
        return $this->belongsTo(Side::class);
    }
}

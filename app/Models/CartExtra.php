<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartExtra extends Model
{
    use HasFactory;
    protected $table = 'cart_extra';
    protected $fillable = [
        'cart_id',
        'extra_id',
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
     * Get the Extra associated with the cart.
     */
    public function extra()
    {
        return $this->belongsTo(Extra::class);
    }
}

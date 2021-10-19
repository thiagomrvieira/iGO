<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartSauce extends Model
{
    use HasFactory;
    protected $table = 'cart_sauce';
    protected $fillable = [
        'cart_id',
        'sauce_id',
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
    public function sauce()
    {
        return $this->belongsTo(Sauce::class);
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getActiveAttribute($value){
        return (boolean) $value;
    }
}

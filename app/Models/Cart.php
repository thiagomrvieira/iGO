<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carts';
    protected $fillable = [
        'order_id',
        'client_id',
        'product_id',
        'quantity',
    ];

    /**
     * Get the product associated with the cart.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    

    /**
     * Get the product extra in the cart.
     */
    public function cartExtras()
    {
        return $this->hasMany(CartExtra::class);    
    }

    /**
     * Get the product side in the cart.
     */
    public function cartSide()
    {
        return $this->hasOne(CartSide::class);    
    }

    /**
     * Get the product sauce in the cart.
     */
    public function cartSauce()
    {
        return $this->hasOne(CartSauce::class);    
    }

    /**
     * Return the total of a product and extras in the cart
     */
    public function amount()
    {
        $product = $this->quantity * $this->product->price;
        $extras  = 0;
        
        foreach ($this->cartExtras as $cartExtra) {
            $extras += $cartExtra->extra->price;
        }
        
        return $product + $extras;
    }

    /**
     * Return the total of all products and extras in the cart
     */
    public function totalAmount()
    {
        $total = 0;
        foreach (Cart::where('client_id', $this->client_id)->where('order_id', $this->order_id)->get() as $cart) {
            $total += $cart->amount();
        }
        return $total;
    }

    /**
     * Observe static methods
     */
    protected static function boot() {
        parent::boot();
    
        #   Delete extras, Side and Sauce when removing items from cart
        static::deleting(function($cart) {
            $cart->cartExtras()->delete();
            $cart->cartSide()->delete();
            $cart->cartSauce()->delete();
        });
    }

    public function getDeletedAtAttribute($value){
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }

    public function getActiveAttribute($value){
        return (boolean) $value;
    }
}

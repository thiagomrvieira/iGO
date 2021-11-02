<?php

namespace App\Models;

use Carbon\Carbon;
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

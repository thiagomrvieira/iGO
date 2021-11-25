<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingFee extends Model
{
    use HasFactory;

    protected $table = 'shipping_fees';
    protected $fillable = [
        'delivery_from',
        'delivery_to',
        'price',
    ];

    /**
     * Get the corresponding county.
     */
    public function from()
    {
        return $this->belongsTo(County::class, 'delivery_from', 'id');
    }

    /**
     * Get the corresponding county.
     */
    public function to()
    {
        return $this->belongsTo(County::class, 'delivery_to', 'id');
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

    /**
     * Set the Price as Cents.
     */
    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price * 100;
    }
}

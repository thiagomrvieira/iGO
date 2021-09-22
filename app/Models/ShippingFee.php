<?php

namespace App\Models;

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
}

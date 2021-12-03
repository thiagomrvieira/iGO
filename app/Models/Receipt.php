<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id', 
        'partner_id', 
        'subtotal',          
        'total',          
        'shipping_fee',          
        'tax_name',
        'tax_number',
    ];

    /**
     * Get the order associated with the Recepit.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the partner associated with the Recepit.
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
     
}

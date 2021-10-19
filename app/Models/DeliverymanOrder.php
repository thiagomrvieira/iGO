<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverymanOrder extends Model
{
    use HasFactory;

    protected $table = 'deliveryman_order';

    protected $fillable = [
        'order_id',
        'deliveryman_id',
        'order_delivery_status_type_id',
        'note'
    ];

    
}

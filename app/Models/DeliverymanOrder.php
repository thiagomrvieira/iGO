<?php

namespace App\Models;

use Carbon\Carbon;
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
     * Get the Order Status.
     */
    public function orderDeliveryStatusType()
    {
        return $this->belongsTo(OrderDeliveryStatusType::class);
    }
    
}

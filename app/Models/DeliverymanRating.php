<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverymanRating extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'client_id',
        'deliveryman_id',
        'review', 
        'rate', 
    ];

    /**
     * Get the order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the the user that rated the order
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the deliveryman rated
     */
    public function deliveryman()
    {
        return $this->belongsTo(DeliveryMan::class);
    }
    

}

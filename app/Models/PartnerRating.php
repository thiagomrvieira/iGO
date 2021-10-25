<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'client_id',
        'partner_id',
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
     * Get the partner rated
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRating extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'client_id',
        'rate', 
    ];

    /**
     * Get the order rated
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


}

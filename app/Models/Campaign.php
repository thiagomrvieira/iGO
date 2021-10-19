<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'type', 
        'percentage', 	
        'active', 
        'code', 
        'start_date', 	
        'finish_date', 	
    ];

     /**
     * Get the products that uses the campaign
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getStartDateAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getFinishDateAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
}

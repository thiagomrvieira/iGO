<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'percentage', 	
        'active', 
        'code', 
        'start_date', 	
        'finish_date', 	
    ];
}

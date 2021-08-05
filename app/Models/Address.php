<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'line_1',
        'line_2',
        'county',
        'city',
        'post_code',
        'country'
    ];

    
}

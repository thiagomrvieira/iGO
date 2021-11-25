<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressTax extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'address_id',
        'tax_name',
        'tax_number',
    ];

}

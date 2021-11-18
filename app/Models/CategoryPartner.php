<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPartner extends Model
{
    use HasFactory;

    protected $table = 'category_partner';
    protected $fillable = [
        'partner_id',
        'category_id',
    ];
}

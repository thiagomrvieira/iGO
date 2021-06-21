<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected $table = 'partner_categories';
    protected $fillable = [
       'id',
       'name',
       'description',
       'active'
    ];
}

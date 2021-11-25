<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $table = 'product_options';
    protected $fillable = [
       'id',
       'name',
       'model',
       'description',
       'partner_category_id'
    ];
    
}

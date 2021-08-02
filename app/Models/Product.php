<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
       'partner_id',
       'image', 
       'name', 
       'description', 
       'price', 
       'available', 
       'note', 
    ];

    protected $casts = [
        'price' => 'float',
    ];

    protected $with = [ 'extras' ];

    /**
     * Get the extras for the product.
     */
    public function extras()
    {
        return $this->hasMany(Extra::class);
    }
}

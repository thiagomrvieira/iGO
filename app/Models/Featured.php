<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    use HasFactory;
    protected $table = 'featured_products';
    
    protected $fillable = [
        'product_id',
        'partner_id',
        'active',
        'start_date',
        'finish_date',
    ];

    /**
     * Get the product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the Partner.
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getStartDateAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getFinishDateAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
}

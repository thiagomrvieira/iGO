<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id', 
        'image_cover', 
        'image_01', 
        'image_02', 
        'image_03', 
    ];

    /**
     * Get the Partner that owns the image.
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}

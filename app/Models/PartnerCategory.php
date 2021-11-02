<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected $table = 'partner_categories';
    protected $fillable = [
       'id',
       'name',
       'slug',
       'parent_id',
       'active'
    ];

    /**
     * Get the Partner that owns the Categories.
     */
    public function partner()
    {
        return $this->belongsToMany(Partner::class);
    }

    /**
     * Get the Parent Category.
     */
    public function parent()
    {
        return $this->hasOne(PartnerCategory::class, 'id', 'parent_id');
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }

    public function getActiveAttribute($value){
        return (boolean) $value;
    }
}

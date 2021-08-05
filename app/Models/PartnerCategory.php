<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected $table = 'categories';
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
}

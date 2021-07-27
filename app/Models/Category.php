<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
       'id',
       'name',
       'description',
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
}

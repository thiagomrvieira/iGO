<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $fillable = [
       'id',
       'name',
       'email',
       'phone_number',
       'mobile_phone_number',
       'address_id',
       'company_name',
       'tax_number',
       'category_id',
       'user_id',
       'active',
       'first_login',
       'average_order_time',
    ];

    /**
     * Get the Address associated with the partner.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the user that owns the Partner profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all Categories that owns the Partner profile.
     */
    public function subCategories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the main Category that owns the Partner profile.
     */
    public function mainCategory()
    {
        // return $this->hasOne(Category::class);
        return $this->hasOne(Category::class, 'id', 'category_id',);

    }

    /**
     * Get the Images that owns the Partner profile.
     */
    public function images()
    {
        return $this->hasMany(Image::class);

    }
}

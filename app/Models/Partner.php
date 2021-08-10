<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
       'approved_at'
    ];

    /**
     * Retrieve these relations when instance created
     */
    protected $with = [
        'subCategories',
    ];

    /**
     * Get the Address associated with the partner.
     */
    public function address()
    {
        // return $this->hasOne(Address::class);
        return $this->hasOne(Address::class, 'user_id', 'user_id');
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
        return $this->belongsToMany(PartnerCategory::class, 'category_partner', 'partner_id', 'category_id');
        // return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');

    }

    /**
     * Get the main Category that owns the Partner profile.
     */
    public function mainCategory()
    {
        // return $this->hasOne(Category::class);
        return $this->hasOne(PartnerCategory::class, 'id', 'category_id');

    }

    /**
     * Get the Images that owns the Partner profile.
     */
    public function images()
    {
        return $this->hasOne(Image::class);

    }

    /**
     * Get the Schedule associated with the partner.
     */
    public function schedule()
    {
        return $this->hasMany(SchedulePartner::class);
    }
}

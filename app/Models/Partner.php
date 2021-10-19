<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $fillable = [
       'id',
       'user_id',
       'name',
       'email',
       'phone_number',
       'mobile_phone_number',
       'address_id',
       'company_name',
       'tax_number',
       'category_id',
       'active',
       'first_login',
       'average_order_time',
       'approved_at',
       'premium'
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
    }

    /**
     * Get the main Category that owns the Partner profile.
     */
    public function mainCategory()
    {
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

    /**
     * Get the Partner Products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function getFirstLoginAttribute($value){
        return (boolean) $value;
    }

    public function getPremiumAttribute($value){
        return (boolean) $value;
    }

    public function getApprovedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getActiveAttribute($value){
        return (boolean) $value;
    }
}

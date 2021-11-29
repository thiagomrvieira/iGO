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
     * Access pivot table directly
     */
    public function subCat()
    {
        return $this->hasMany(CategoryPartner::class,  'partner_id', 'id');
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
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
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


    /**
     * Get the Partner Ratings.
     */
    public function reviewsAndRatings()
    {
        return $this->hasMany(PartnerRating::class);
    }

    /**
     * Get the Partner Orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * FILTER
     */
    public function scopeFilter($query, array $filters)
    {
        #   Search in Company name
        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query->where('company_name', 'like', '%' . $search . '%')
        );
        #   Search in Main category
        $query->when($filters['cat'] ?? false, fn ($query, $search) => 
            $query->whereIn('category_id', $filters['cat'] )
        );
        #   Search in Sub category
        if ($filters['subcat'] ?? false) {
            $query->orWhereHas('subCat', function ($query) use ($filters) {
                $query->whereIn('category_id', $filters['subcat']);
            });
        }
        #   Filter by location
        if ($filters['location'] ?? false) {
            $query->whereHas('address', function ($query) use ($filters) {
                $query->where('county_id', $filters['location']);
            });
        }
       
    }

    
    /**
     * Get the partner's campaigns
     */
    public function campaigns()
    {
        return Campaign::where('code', null)->where('active', 1)
            ->where('start_date' , '<=' , Carbon::now())
            ->where('finish_date', '>=' , Carbon::now())
            ->whereIn('id',  $this->products->where('campaign_id', '!=', null)->pluck(['campaign_id']))
            ->orderBy('percentage', 'DESC')->get();
    }

    /**
     * Get the best partner's campaign
     */
    public function bestCampaign()
    {
        return $this->campaigns()->first();
    }
    
}

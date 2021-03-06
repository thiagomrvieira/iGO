<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
       'partner_id',
       'category_id',
       'image', 
       'name', 
       'description', 
       'price', 
       'available', 
       'note', 
       'campaign_id', 
    ];

    protected $casts = [
        'price' => 'float',
    ];

    protected $with = [ 'extras', 'category' ];

    /**
     * Get the extras for the product.
     */
    public function extras()
    {
        return $this->hasMany(Extra::class);
    }

    /**
     * Get the partner that owns the Product.
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the product category
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get the Side Product (eg.: Side Dish )
     */
    public function sides()
    {
        return $this->belongsToMany(Side::class, 'product_side');
    }

    /**
     * Get Sauces
     */
    public function sauces()
    {
        return $this->belongsToMany(Sauce::class, 'product_sauce');
    }

    /**
     * Get Allergens
     */
    public function allergens()
    {
        return $this->belongsToMany(Allergen::class, 'allergen_product');
    }

    /**
     * Get featured
     */
    public function featured()
    {
        return $this->hasOne(Featured::class);
    }

    /**
     * Get campaign
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    
    /**
     * Find product price with discount
     */
    public function finalPrice()
    {
        #   Check if the product is associated with a campaing anc check the type
        if (isset($this->campaign->id) && $this->campaign->type == 'percentage-item') {
            
            #   Check if the campaign date is valid
            if (Carbon::now() >= $this->campaign->start_date && Carbon::now() <= $this->campaign->finish_date) {
               
                #   Return price with discount
                return $this->price - ($this->price * ($this->campaign->percentage / 100) );       
            }

        }
        
    }

    /**
     * Use the relation to validate campaign date and return campaign data from relation
     */
    public function campaignData()
    {
        #   Check if the product is associated with a campaing anc check the type
        if (isset($this->campaign->id)) {
            
            #   Check if the campaign date is valid
            if (Carbon::now() >= $this->campaign->start_date && Carbon::now() <= $this->campaign->finish_date) {
               
                #   Return price with discount
                return $this->campaign;      
            }

        }
        
    }

    public function getAvailableAttribute($value){
        return (boolean) $value;
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
     * Set the Price as Cents.
     */
    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = ($price) * 100;
    }
    
}

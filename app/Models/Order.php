<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'address_id',
        'campaign_id',
        'order_status_type_id',
        'tax_name',
        'tax_number',
        'amount',
        'deliver_at', 
    ];

    // /**
    //  * Get the order's items/products.
    //  */
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    // }

    
    /**
     * Get the items/products in the cart
     */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the Address associated with the order.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the Order Status.
     */
    public function orderStatusType()
    {
        return $this->belongsTo(OrderStatusType::class);
    }



    /**
     * Return the subtotal - Sum of all product and extras in the order
     */
    public function subtotal()
    {
        $subTotal = 0;
        
        foreach ($this->cart as $cart) {
            $subTotal += $cart->amount();
        }
        return $subTotal;
    }

    /**
     * Return the total - Sum of Total and Shipping fee
     */
    public function total()
    {
        return $this->subTotal() + $this->shippingFee();
    }

    /**
     * Return the shipping fee based in user and partner location
     */
    public function shippingFee()
    {
        # Get the first Product in the cart
        $cart = $this->cart->first();
        # Get the Partner
        $partner = $cart->product->partner;
        # Get The county names
        $deliveryFrom = County::where('id', $this->address->county_id)->first();
        $deliveryTo   = County::where('id', $partner->address->county_id)->first();

        return ShippingFee::where('delivery_from', $deliveryFrom->id)
                          ->where('delivery_to',   $deliveryTo->id)->first()->price;
    }

    /**
     * Get the order's items/products.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Return the value of the discount
     */
    public function discount()
    {   
        if (isset($this->campaign)){
            return $this->total() * ($this->campaign->percentage / 100);
        }
        return null;
    }

    /**
     * Get the client rating.
     */
    public function rating()
    {
        return $this->hasOne(OrderRating::class);
    }

    /**
     * Get the Delivery man who delivered the product.
     */
    public function deliverymen()
    {
        return $this->hasMany(DeliverymanOrder::class);
    }

    public function getDeliverAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getDeliveredAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getDeletedAtAttribute($value){
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

<?php

namespace App\Models;

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

    /**
     * Get the order's items/products.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }

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
        $deliveryFrom = County::where('name', $this->address->county)->first();
        $deliveryTo   = County::where('name', $partner->address->county)->first();

        return ShippingFee::where('delivery_from', $deliveryFrom->id)
                          ->where('delivery_to',   $deliveryTo->id)->first()->price;
    }





}

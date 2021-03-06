<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'is_admin',
        'is_partner',
        'is_deliveryman',
        'is_client',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the DeliveryMan associated with the user.
     */
    public function deliveryman()
    {
        return $this->hasOne(DeliveryMan::class);
    }

    /**
     * Get the Partner associated with the user.
     */
    public function partner()
    {
        return $this->hasOne(Partner::class);
    }

    /**
     * Get the Client associated with the user.
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    /**
     * Get the Addresses associated with the user.
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Return boolean fields as TRUE/FALSE instead of 0/1
     */
    public function getActiveAttribute($value){
        return (boolean) $value;
    }
    public function getIsAdminAttribute($value){
        return (boolean) $value;
    }
    public function getIsPartnerAttribute($value){
        return (boolean) $value;
    }
    public function getIsDeliverymanAttribute($value){
        return (boolean) $value;
    }
    public function getIsClientAttribute($value){
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



}

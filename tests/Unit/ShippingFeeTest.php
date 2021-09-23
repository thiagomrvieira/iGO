<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\ShippingFee;
use Tests\TestCase;

use Laravel\Passport\Passport;
use App\Models\User;



class ShippingFeeTest extends TestCase
{
    const CLIENT_EMAIL = 'client01@igo.pt';
    
    /**
     * @test
     * @group shippingfee
     */
    public function api_is_accessible_and_protected_by_token()
    {
        
        $response = $this->json('get', '/api/v1/shippingfee')
            ->assertStatus(401);
        
    }

    
    /** 
     * @test 
     * @group shippingfee
     */
    public function a_user_can_get_the_list_of_all_shipping_fees()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/shippingfee');

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'delivery_from',
                    'delivery_to',
                    'price',
                ]
            ]
        ]);
    }

    



}

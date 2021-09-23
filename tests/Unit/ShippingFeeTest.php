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
        
        $response = $this->json('get', '/api/v1/shippingfees')
            ->assertStatus(401);
        
    }

    
    /** 
     * @test 
     * @group shippingfee
     */
    public function a_user_can_get_the_list_of_all_shipping_fees()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/shippingfees');

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'delivery_from_id',
                    'delivery_from_name',
                    'delivery_to_id',
                    'delivery_to_name',
                    'price'          
                ]
            ]
        ]);
    }


    /** 
     * @test 
     * @group shippingfee
     */
    public function a_user_can_get_the_shipping_fee_data_by_id()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/shippingfees/1');

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'delivery_from_id',
                    'delivery_from_name',
                    'delivery_to_id',
                    'delivery_to_name',
                    'price'          
                ]
            ]
        ]);
    }



}

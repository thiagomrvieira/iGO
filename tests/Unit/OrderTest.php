<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Client;
use App\Models\Product;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\User;



class OrderTest extends TestCase
{
    const CLIENT_EMAIL = 'client01@igo.pt';
    
    /**
     * @test
     * @group order
     */
    public function api_is_accessible_and_protected_by_token()
    {
        
        $response = $this->json('get', '/api/v1/orders')
            ->assertStatus(401);
        
    }

    
    /** 
     * @test 
     * @group order
     */
    public function a_user_can_order_products()
    {
        // Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        // $response = $this->json('post', '/api/v1/orders', [
        //     // 'client_id'  => Client::where('email', self::CLIENT_EMAIL)->get()->id,
        //     'product_id' => Product::inRandomOrder()->first()->id,
        //     'quantity'   => 1,
        // ]);

        // $response->assertSuccessful();

        // $response->assertStatus(200);

        // $this->assertDatabaseHas('order_product', [
        //     // 'client_id'  => 1,
        //     'product_id' => 1,
        //     'quantity'   => 1,
        // ]);

        
        
        // $response->assertJsonStructure([
        //     'data' => [
        //         '*' => [
        //             'id',
        //             'delivery_from_id',
        //             'delivery_from_name',
        //             'delivery_to_id',
        //             'delivery_to_name',
        //             'price'          
        //         ]
        //     ]
        // ]);
    }


    // /** 
    //  * @test 
    //  * @group shippingfee
    //  */
    // public function a_user_can_get_the_shipping_fee_data_by_id()
    // {
    //     Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

    //     $response = $this->json('get', '/api/v1/shippingfees/1');

    //     $response->assertSuccessful();

    //     $response->assertStatus(200);
        
    //     $response->assertJsonStructure([
    //         'data' => [
    //             '*' => [
    //                 'id',
    //                 'delivery_from_id',
    //                 'delivery_from_name',
    //                 'delivery_to_id',
    //                 'delivery_to_name',
    //                 'price'          
    //             ]
    //         ]
    //     ]);
    // }

    // /** 
    //  * @test 
    //  * @group shippingfee
    //  */
    // public function a_user_can_get_the_shipping_fee_data_by_from_to_locations()
    // {
    //     Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

    //     $response = $this->json('get', '/api/v1/shippingfees/1/2');

    //     $response->assertSuccessful();

    //     $response->assertStatus(200);
        
    //     $response->assertJsonStructure([
    //         'data' => [
    //             '*' => [
    //                 'id',
    //                 'delivery_from_id',
    //                 'delivery_from_name',
    //                 'delivery_to_id',
    //                 'delivery_to_name',
    //                 'price'          
    //             ]
    //         ]
    //     ]);

    //     // $response = $this->json('get', '/api/v1/shippingfees/Belas/Luanda');

    //     // $response->assertSuccessful();

    //     // $response->assertStatus(200);
        
    //     // $response->assertJsonStructure([
    //     //     'data' => [
    //     //         '*' => [
    //     //             'id',
    //     //             'delivery_from_id',
    //     //             'delivery_from_name',
    //     //             'delivery_to_id',
    //     //             'delivery_to_name',
    //     //             'price'          
    //     //         ]
    //     //     ]
    //     // ]);
    // }


}

<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Client;
use App\Models\Product;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\User;



class CartTest extends TestCase
{
    const CLIENT_EMAIL = 'client01@igo.pt';
    
    /**
     * @test
     * @group cart
     */
    public function api_is_accessible_and_protected_by_token()
    {
        $response = $this->json('get', '/api/v1/cart')
            ->assertStatus(401);
    }

    
    /** 
     * @test 
     * @group cart
     */
    public function a_user_can_see_wich_products_he_has_in_his_cart()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/cart');

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'product_id',
                    'product_name',
                    'product_price',
                    'quantity',
                    'amount',
                    'created_at',
                ]
            ]
        ]);
    }


    /** 
     * @test 
     * @group cart
     */
    public function a_user_can_add_products_to_the_cart()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $productId = Product::inRandomOrder()->first()->id;

        $response = $this->json('post', '/api/v1/cart', [
            'product_id' => $productId,
            'quantity'   => 1,
        ]);

        $response->assertSuccessful();

        $response->assertStatus(200);

        $this->assertDatabaseHas('carts', [
            'client_id'  => Client::where('email', self::CLIENT_EMAIL)->first()->id,
            'product_id' => $productId,
            'quantity'   => 1,
        ]);
        
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

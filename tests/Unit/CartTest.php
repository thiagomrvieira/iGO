<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Cart;
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
            'status',
            'message',
            'data',
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
       
    }


    /** 
     * @test 
     * @group cart
     */
    public function a_user_can_remove_products_from_the_cart()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());
        
        $clientId = User::where('email', self::CLIENT_EMAIL)->first()->client->id;
        
        $productInCart = Cart::where('client_id', $clientId)->where('deleted_at', null)->inRandomOrder()->first();

        $response = $this->json('delete', '/api/v1/cart/' . $productInCart->product_id);

        $response->assertSuccessful();

        $response->assertStatus(200);

        $this->assertSoftDeleted('carts', [
            'client_id'  => $clientId,
            'product_id' => $productInCart->product_id,
        ]);
       
    }



}

<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Partner;
use Tests\TestCase;

use Laravel\Passport\Passport;
use App\Models\User;



class PartnerTest extends TestCase
{
    const CLIENT_EMAIL = 'client01@igo.pt';
    
    /**
     * @test
     * @group partner
     */
    public function api_is_accessible_and_protected()
    {
        
        $response = $this->json('get', '/api/v1/partners')
            ->assertStatus(401);
        
    }

    /** 
     * @test 
     * @group partner
     */
    public function a_user_can_get_the_list_of_all_partners()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/partners');

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
     * @group partner
     */
    public function a_user_can_get_the_details_of_a_partner()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/partners/1');

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
     * @group partner
     */
    public function a_user_can_not_get_the_details_of_a_nonexistent_partner()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $lastId = Partner::latest()->first()->id;

        $response = $this->json('get', '/api/v1/partners/'. $lastId ++);

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => []
        ]);
    }


    /** 
     * @test 
     * @group partner
     */
    public function a_user_can_see_all_partner_products()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $partnerId = Partner::first()->id;

        $response = $this->json('get', '/api/v1/partners/'. $partnerId .'/products');

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        // $response->assertJsonStructure([
        //     'data' => []
        // ]);
    }


}

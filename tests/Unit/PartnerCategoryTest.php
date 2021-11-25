<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Partner;
use Tests\TestCase;

use Laravel\Passport\Passport;
use App\Models\User;



class PartnerCategoryTest extends TestCase
{
    const CLIENT_EMAIL = 'client01@igo.pt';
    
    /**
     * @test
     * @group partnerCategory
     */
    public function api_is_accessible_and_protected()
    {
        
        $response = $this->json('get', '/api/v1/categories')
            ->assertStatus(401);
        
    }

    /** 
     * @test 
     * @group partnerCategory
     */
    public function a_user_can_get_the_list_of_all_partner_categories()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/categories');

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
     * @group partnerCategory
     */
    public function a_user_can_get_the_a_specified_category()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('get', '/api/v1/categories/1');

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
     * @group partnerCategory
     */
    public function a_user_can_not_get_the_details_of_a_nonexistent_category()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $lastId = Partner::latest()->first()->id;

        $response = $this->json('get', '/api/v1/categories/'. $lastId ++);

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => []
        ]);
    }


}

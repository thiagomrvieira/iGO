<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Laravel\Passport\Passport;
use App\Models\User;



class PartnerTest extends TestCase
{
    const CLIENT_EMAIL = 'client@igo.pt';
    
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
        
        // $response->assertJsonStructure([
        //     'token',
        // ]);
    }
}

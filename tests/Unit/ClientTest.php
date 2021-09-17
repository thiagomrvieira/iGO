<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Partner;
use Tests\TestCase;

use Laravel\Passport\Passport;
use App\Models\User;



class ClientTest extends TestCase
{
    const CLIENT_EMAIL = 'client01@igo.pt';
    
    /** 
     * @test 
     * @group client
     */
    public function a_client_can_add_and_remove_partners_from_favorites()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());

        $response = $this->json('post', '/api/v1/favorite/1');

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        
    }

    /** 
     * @test 
     * @group client
     */
    public function a_client_can_not_add_a_nonexistent_partner_to_favorites()
    {
        Passport::actingAs(User::where('email', self::CLIENT_EMAIL)->first());
        
        $randomId  = 999;
        
        $response  = $this->json('post', '/api/v1/favorite/'.$randomId);
        
        $res_array = (array)json_decode($response->content());

        $this->assertArrayHasKey('exception', $res_array);
        
        $this->assertDatabaseMissing ('client_partner', [ 'partner_id' => $randomId ]);
        
        $response->assertStatus(404);
        
    }
    



}

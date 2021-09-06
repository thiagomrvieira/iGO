<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    // use RefreshDatabase;
    
    /** @test */
    public function users_can_login()
    {
        $response = $this->post('/api/v1/register', [
            'name'     => 'Test User 02',
            'email'    => 'test05@example.com',
            'password' => 'test05@example.com',
        ]);

        $response->assertSuccessful();

    }

    

}

<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    // use RefreshDatabase;

    public function test_new_users_can_register()
    {
        $response = $this->post('/api/v1/register', [
            'name'                => 'Test User 01',
            'email'               => 'test01@example.com',
            'mobile_phone_number' => 'password',
            'line_1'              => 'Rua Diogo Cão',
            'county'              => 'Estoril',
            'city'                => 'Cascais',
            'password'            => 'password',

        ]);

        $response->assertStatus(200);

    }


}

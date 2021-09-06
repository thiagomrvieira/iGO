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
            'name'                => 'Test User 02',
            'email'               => 'test05@example.com',
            'mobile_phone_number' => 'password',
            'line_1'              => 'Rua Diogo Cão',
            'county'              => 'Estoril',
            'city'                => 'Cascais',
            'password'            => 'password',

        ]);

        $response->assertSuccessful();

    }

    public function test_users_can_not_register_with_in_use_email()
    {
        $response = $this->post('/api/v1/register', [
            'name'                => 'Test User 02',
            'email'               => 'test05@example.com',
            'mobile_phone_number' => 'password',
            'line_1'              => 'Rua Diogo Cão',
            'county'              => 'Estoril',
            'city'                => 'Cascais',
            'password'            => 'password',

        ]);

        $response->assertInvalid(['email']);

        $response->assertSessionHasErrors([
            'email' => 'O email informado já está em uso.'
        ]);

        

    }

}

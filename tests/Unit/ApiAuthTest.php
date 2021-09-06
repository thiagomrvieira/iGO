<?php

namespace Tests\Unit;

use App\Models\User;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiAuthTest extends TestCase
{
    public $user;

    protected function setUp() :void
    {
        parent::setUp();
        $this->user = User::factory()->make();
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/api/v1/register', [
            'name'                => $this->user->name,
            'email'               => $this->user->email,
            'mobile_phone_number' => '987 654 321',
            'line_1'              => 'Rua Diogo Cão',
            'county'              => 'Estoril',
            'city'                => 'Cascais',
            'password'            => 'password',

        ]);

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'token',
        ]);
    }

    // public function test_users_can_not_register_with_in_use_email()
    // {
    //     $user = User::factory()->make();

    //     $response = $this->post('/api/v1/register', [
    //         'name'                => $this->user->name,
    //         'email'               => $this->user->email,
    //         'mobile_phone_number' => '987 654 321',
    //         'line_1'              => 'Rua Diogo Cão',
    //         'county'              => 'Estoril',
    //         'city'                => 'Cascais',
    //         'password'            => 'password',

    //     ]);

    //     $response->assertInvalid(['email']);

    //     $response->assertSessionHasErrors([
    //         'email' => 'O email informado já está em uso.'
    //     ]);

        

    // }
}

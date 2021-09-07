<?php

namespace Tests\Unit;

use App\Models\User;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class ApiAuthTest extends TestCase
{
    use WithFaker;

    public function test_new_users_can_register()
    {
        $response = $this->post('/api/v1/register', [
            'name'                => $this->faker->name(),
            'email'               => $this->faker->unique()->safeEmail(),
            'mobile_phone_number' => $this->faker->phoneNumber(),
            'line_1'              => $this->faker->secondaryAddress(),
            'county'              => $this->faker->cityPrefix(),
            'city'                => $this->faker->city(),
            'password'            => 'iGOdelivery',
        ]);

        $response->assertSuccessful();

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'token',
        ]);
    }
    
}

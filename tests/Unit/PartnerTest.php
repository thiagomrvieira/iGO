<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Laravel\Passport\Passport;
use App\User;



class PartnerTest extends TestCase
{
    const ADMIN_EMAIL = 'admin@company';
    const USER_EMAIL = 'user@company';
    
    /** @test */
    public function a_user_can_get_the_list_of_all_partners()
    {
        
        // $response = $this->post('/api/v1/register', [
        //     'name'                => $this->faker->name(),
        //     'email'               => $this->faker->unique()->safeEmail(),
        //     'mobile_phone_number' => $this->faker->phoneNumber(),
        //     'line_1'              => $this->faker->secondaryAddress(),
        //     'county'              => $this->faker->cityPrefix(),
        //     'city'                => $this->faker->city(),
        //     'password'            => 'iGOdelivery',
        // ]);

        // $response->assertSuccessful();

        // $response->assertStatus(200);
        
        // $response->assertJsonStructure([
        //     'token',
        // ]);
    }
}

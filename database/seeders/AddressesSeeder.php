<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\AddressType;
use App\Models\County;
use App\Models\Image;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;


class AddressesSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        #   Cria endereços para cada aderente
        foreach (Partner::all() as $partner) {
            Address::create([
                'address_name'    => $faker->company(),
                'user_id'         => $partner->user->id,
                // 'address_type_id' => AddressType::inRandomOrder()->first()->id,
                'line_1'          => $faker->streetAddress(),
                'line_2'          => null,
                'county_id'       => County::inRandomOrder()->first()->id,
                'locality'        => $faker->city(),
                'post_code'       => $faker->postcode(),
                'country'         => $faker->country(),  
            ]);
        }

    }
}

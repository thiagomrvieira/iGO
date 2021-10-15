<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Foundation\Testing\WithFaker;


class PartnerImagesSeeder extends Seeder
{
    // use WithFaker;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        #   Cria imagens para cada aderente
        foreach (Partner::all() as $partner) {
            Image::create([
                'partner_id'  => $partner->id, 
                'image_cover' => $faker->image(), 
                'image_01'    => $faker->image(), 
                'image_02'    => $faker->image(), 
                'image_03'    => $faker->image(), 
            ]);
        }

    }
}

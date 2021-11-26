<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Seeder;


class PartnerImagesSeeder extends Seeder
      
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        #   Cria imagens para cada aderente
        foreach (Partner::all() as $key => $partner) {
            Image::create([
                'partner_id'  => $partner->id, 
                'image_cover' => '202111121156070.jpg', 
                'image_01'    => '202111121156071.jpg',
                'image_02'    => '202111121156072.jpg',
                'image_03'    => '202111121156073.jpg',
            ]);
        }

    }
}

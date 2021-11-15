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
                'image_cover' => 'storage/images/sample-partners/image_0' . ($key + 1) . '.png', 
                'image_01'    => 'storage/images/sample-partners/image_0' . ($key + 2) . '.png',
                'image_02'    => 'storage/images/sample-partners/image_0' . ($key + 3) . '.png',
                'image_03'    => 'storage/images/sample-partners/image_0' . ($key + 4) . '.png',
            ]);
        }

    }
}

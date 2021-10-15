<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Foundation\Testing\WithFaker;


class PartnersSeeder extends Seeder
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

        #   Users
        $user01 = User::create([
            'name'           => $faker->name(),
            'email'          => $faker->unique()->safeEmail(),
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 1,
            'is_deliveryman' => 0,
        ]);
        
        $user02 = User::create([
            'name'           => $faker->name(),
            'email'          => $faker->unique()->safeEmail(),
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 1,
            'is_deliveryman' => 0,
        ]);

        $user03 = User::create([
            'name'           => $faker->name(),
            'email'          => $faker->unique()->safeEmail(),
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 1,
            'is_deliveryman' => 0,
        ]);
        
        #   Partners
        $data = array(
            array('user_id' => $user01->id, 'name' => $user01->name, 'email'=> $user01->email, 'company_name' => $faker->company(), 'active' => true),
            array('user_id' => $user02->id, 'name' => $user02->name, 'email'=> $user02->email, 'company_name' => $faker->company(), 'active' => true),
            array('user_id' => $user03->id, 'name' => $user03->name, 'email'=> $user03->email, 'company_name' => $faker->company(), 'active' => true),
        );
        
        #   Cria partners
        Partner::insert($data);

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

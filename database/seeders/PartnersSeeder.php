<?php

namespace Database\Seeders;

use App\Models\CategoryPartner;
use App\Models\Image;
use App\Models\Partner;
use App\Models\PartnerCategory;
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

        for ($i=0; $i < 25; $i++) { 
            
            #   Users
            $user = User::create([
                'name'           => $faker->name(),
                'email'          => $faker->unique()->safeEmail(),
                'password'       => bcrypt('iGOdelivery'),
                'is_admin'       => 0,
                'is_partner'     => 1,
                'is_deliveryman' => 0,
            ]);
            
            $partnerCategory = PartnerCategory::where(['parent_id' => null, 'active' => 1])->inRandomOrder()->first();
            
            #   Cria partners
            $partner = Partner::create([
                'user_id'      => $user->id, 
                'name'         => $user->name, 
                'email'        => $user->email, 
                'company_name' => $faker->company(), 
                'active'       => true, 
                'category_id'  => $partnerCategory->id,
                'first_login'  => false,
            ]);

            $subCats = PartnerCategory::where(['parent_id' => $partnerCategory->id, 'active' => 1])->get()->random(random_int(1, 2));
            
            #   Add subcategorias
            foreach ($subCats as $subCat) {
                CategoryPartner::create([
                    'partner_id'  => $partner->id,
                    'category_id' => $subCat->id,
                ]);
            }

        }

        

    }
}

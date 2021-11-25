<?php

namespace Database\Seeders;

use App\Models\Extra;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        for ($i=0; $i < 200 ; $i++) { 
            $extras[] = array(
                'product_id'  => Product::inRandomOrder()->first()->id,  
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(4), 
            );
        }

        #   Cria extras
        Extra::insert($extras);
    }
}

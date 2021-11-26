<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        for ($i=0; $i < 150 ; $i++) { 
            $products[] = array(
                'partner_id'  => Partner::inRandomOrder()->first()->id,  
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => 'image' . random_int(1, 4) . '.jpg',   
                'name'        => $faker->company(), 
                'description' => $faker->text(),
                'price'       => $faker->randomNumber(5) * 100 , 
                'available'   => (bool)random_int(0, 1),
                'note'        => $i % 2 == 0 ? $faker->text() : null,
                'campaign_id' => $i % 3 == 0 ? Campaign::inRandomOrder()->first()->id : null,
                'created_at'  => $faker->dateTimeBetween('-8 week', '+1 week')
            );
        }

        #   Cria Produtos
        Product::insert($products);
    }
}

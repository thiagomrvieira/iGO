<?php

namespace Database\Seeders;

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

        #   Products
        $data = array(
            array(
                'partner_id'  => Partner::inRandomOrder()->first()->id, 
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => $faker->image(),   
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(2), 
                'description' => $faker->text()
            ),
            array(
                'partner_id'  => Partner::inRandomOrder()->first()->id, 
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => $faker->image(),   
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(2), 
                'description' => $faker->text()
            ),
            array(
                'partner_id'  => Partner::inRandomOrder()->first()->id, 
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => $faker->image(),   
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(2), 
                'description' => $faker->text()
            ),
            array(
                'partner_id'  => Partner::inRandomOrder()->first()->id, 
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => $faker->image(),   
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(2), 
                'description' => $faker->text()
            ),
            array(
                'partner_id'  => Partner::inRandomOrder()->first()->id, 
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => $faker->image(),   
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(2), 
                'description' => $faker->text()
            ),
            array(
                'partner_id'  => Partner::inRandomOrder()->first()->id, 
                'category_id' => ProductCategory::inRandomOrder()->first()->id, 
                'image'       => $faker->image(),   
                'name'        => $faker->company(), 
                'price'       => $faker->randomNumber(2), 
                'description' => $faker->text()
            ),
            
        );
       
        #   Cria Produtos
        Product::insert($data);
    }
}

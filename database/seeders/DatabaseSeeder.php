<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PartnerCategorySeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(SideSeeder::class);
        $this->call(SauceSeeder::class);
        $this->call(AllergenSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}

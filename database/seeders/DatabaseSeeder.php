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
        $this->call(CampaignSeeder::class);
        $this->call(AddressTypeSeeder::class);
        $this->call(CountiesSeeder::class);
        $this->call(ShippingFeeSeeder::class);
        $this->call(OrderStatusTypesSeeder::class);
        $this->call(PartnersSeeder::class);
        $this->call(PartnerImagesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ExtraSeeder::class);
        $this->call(AddressesSeeder::class);
        $this->call(OrderDeliveryStatusTypeSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}

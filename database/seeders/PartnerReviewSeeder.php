<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Order;
use App\Models\Partner;
use App\Models\PartnerCategory;
use App\Models\PartnerRating;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Foundation\Testing\WithFaker;


class PartnerReviewSeeder extends Seeder
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

        #   Cria review para cada compra
        foreach (Order::where('order_status_type_id', 8)->get() as $order) {
            PartnerRating::create([
                'order_id'   => $order->id, 
                'client_id'  => $order->client_id, 
                'partner_id' => 1, 
                'rate'       => random_int(1, 5), 
                'review'     => $faker->text(), 
            ]);
        }

    }
}

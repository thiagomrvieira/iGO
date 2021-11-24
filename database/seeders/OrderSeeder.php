<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Cart;
use App\Models\CartExtra;
use App\Models\CartSauce;
use App\Models\CartSide;
use App\Models\Client;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Partner;
use App\Models\DeliveryMan;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\OrderStatusType;
use Illuminate\Support\Facades\Auth;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $client  = Client::where('email', 'client01@igo.pt')->first();
        $user    = $client->user;
        $address = $user->addresses->first();
        
        for ($i=0; $i < 12; $i++) { 
            
            $product = Product::inRandomOrder()->first();
            $extra   = $product->extras->first();
            $side    = $product->sides->first();
            $sauce   = $product->sauces->first();

            if ($i == 1) {
                $orderStatus = OrderStatusType::where('name', 'Aberto')->first()->id;
            }else if ($i == 2) {
                $orderStatus = OrderStatusType::where('name', 'Submetido')->first()->id;
            }else if ($i > 2 && $i < 5) {
                $orderStatus = OrderStatusType::where('name', 'Em curso')->inRandomOrder()->first()->id;
            }else if ($i > 5 && $i < 9) {
                $orderStatus = OrderStatusType::where('name', 'Entregue')->first()->id;
            }else{
                $orderStatus = OrderStatusType::where('name', 'Cancelado')->first()->id;
            }


            $order01 = Order::create(
                [
                    'client_id'            => $client->id,
                    'order_status_type_id' => $orderStatus,
                    'address_id'           => $address->id,
                    'tax_name'             => $user->name,
                    'tax_number'           => $user->tax_number ?? null,
                    'partner_id'           => $product->partner_id,
                ]
            );

            $cart01 = Cart::create(
                [
                    'client_id'  => $client->id,
                    'order_id'   => $order01->id,
                    'product_id' => $product->id,  
                    'quantity'   => random_int(1, 3),
                ]
            );
        
            if (isset($extra)) {
                CartExtra::create(
                    [
                        'cart_id'  => $cart01->id,
                        'extra_id' => $extra->id,
                        // 'quantity' => random_int(1, 3),
                    ]
                );
            }
            if (isset($side)) {
                CartSide::create(
                    [
                        'cart_id'  => $cart01->id,
                        'side_id'  => $side->id,
                    ]
                );
            }
            if (isset($sauce)) {
                CartSauce::create(
                    [
                        'cart_id'  => $cart01->id,
                        'sauce_id' => $sauce->id,
                    ]
                );
            }
        
        }
        
    }
}

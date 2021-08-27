<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Partner;
use App\Models\DeliveryMan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Administrador',
            'email'          => 'admin@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 1,
            'is_partner'     => 0,
            'is_deliveryman' => 0,
        ]);


        User::create([
            'name'           => 'Parceiro',
            'email'          => 'partner@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'active'         => 1,
            'is_admin'       => 0,
            'is_partner'     => 1,
            'is_deliveryman' => 0,
        ]);

        User::create([
            'name'           => 'Estafeta',
            'email'          => 'estafeta@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 0,
            'is_deliveryman' => 1,
        ]);


        $partner = Partner::create([
            'name'           => 'Parceiro',
            'email'          => 'partner@igo.pt',
            'company_name'   => 'iGO Delivery',
            'category_id'    => 1,
            'user_id'        => 2,
        ]);


        $deliveryman = DeliveryMan::create([
            'name'                => 'Estafeta',
            'email'               => 'estafeta@igo.pt',
            'mobile_phone_number' => '987 654 321',
        ]);

        
    }
}

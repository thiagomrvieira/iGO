<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Partner;
use App\Models\DeliveryMan;
use Carbon\Carbon;

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

        $client01 = User::create([
            'name'           => 'Client 01',
            'email'          => 'client01@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 0,
            'is_deliveryman' => 0,
            'is_client'      => 1,
            'active'         => 1,

        ]);

        $client02 = User::create([
            'name'           => 'Client 02',
            'email'          => 'client02@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 0,
            'is_deliveryman' => 0,
            'is_client'      => 1,
            'active'         => 1,
        ]);

        $partner01 = User::create([
            'name'           => 'Parceiro 01',
            'email'          => 'partner01@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'active'         => 1,
            'is_admin'       => 0,
            'is_partner'     => 1,
            'is_deliveryman' => 0,
        ]);

        $partner02 = User::create([
            'name'           => 'Parceiro 02',
            'email'          => 'partner02@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'active'         => 1,
            'is_admin'       => 0,
            'is_partner'     => 1,
            'is_deliveryman' => 0,
        ]);

        $deliveryman =  User::create([
            'name'           => 'Estafeta',
            'email'          => 'estafeta@igo.pt',
            'password'       => bcrypt('iGOdelivery'),
            'is_admin'       => 0,
            'is_partner'     => 0,
            'is_deliveryman' => 1,
        ]);

        $partners = array(
            array(  
                'name'           => $partner01->name,
                'email'          => 'partner01@igo.pt',
                'company_name'   => 'Fake company 01',
                'category_id'    => 1,
                'user_id'        => $partner01->id,
                'active'         => 1,
                'created_at'     => Carbon::now()
            ),
            array( 
                'name'           => $partner02->name,
                'email'          => 'partner02@igo.pt',
                'company_name'   => 'Fake company 02',
                'category_id'    => 1,
                'user_id'        => $partner02->id,
                'active'         => 1,
                'created_at'     => Carbon::now()

            ) ,
        );
        Partner::insert($partners);


        DeliveryMan::create([
            'name'                => 'Estafeta',
            'email'               => 'estafeta@igo.pt',
            'mobile_phone_number' => '987 654 321',
            'user_id'             => $deliveryman->id,
        ]);

      
        $clients = array(
            array(  
                'name'                => 'Cliente 01',
                'email'               => 'client01@igo.pt',
                'mobile_phone_number' => '987 654 321',
                'user_id'             => $client01->id,
                'active'              => 1,
            ),
            array( 
                'name'                => 'Cliente 02',
                'email'               => 'client02@igo.pt',
                'mobile_phone_number' => '987 654 321',
                'user_id'             => $client02->id,
                'active'              => 1,
            ) ,
        );
        Client::insert($clients);
        
        
    }
}

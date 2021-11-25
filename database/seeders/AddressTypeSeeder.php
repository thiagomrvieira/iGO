<?php

namespace Database\Seeders;

use App\Models\AddressType;
use Illuminate\Database\Seeder;

class AddressTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name'=>'delivery', 'active' => true),
            array('name'=>'billing',  'active' => true),
        );
        AddressType::insert($data);
    }
}

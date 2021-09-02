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
            array('name'=>'Casa',     'active' => true),
            array('name'=>'Trabalho', 'active' => true),
            array('name'=>'Outro',    'active' => true),
        );
        AddressType::insert($data);
    }
}

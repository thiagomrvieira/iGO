<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\Province;
use Illuminate\Database\Seeder;

class CountiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = Province::where('name', 'Luanda')->first();

        $data = array(
            array(
                'name'        => 'Belas',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Cacuaco',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Cazenga',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Icolo e Bengo',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Luanda',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Quiçama',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Kilamba Kiaxi',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Talatona',  
                'province_id' => $province->id,   
            ),
            array(
                'name'        => 'Viana',  
                'province_id' => $province->id,   
            ),
        );
        
        County::insert($data);
    }
}

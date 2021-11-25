<?php

namespace Database\Seeders;

use App\Models\County;
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
        $data = array(
            array(
                'name'    => 'Belas',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cacuaco',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cazenga',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Icolo e Bengo',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Luanda',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Quiçama',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Kilamba Kiaxi',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Talatona',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Viana',  
                'country' => 'Angola',   
            ),
        );
        
        County::insert($data);
    }
}

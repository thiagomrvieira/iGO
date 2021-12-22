<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
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
                'name'    => 'Bengo',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Benguela',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Bié',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cabinda',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cuando-Cubango',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cuanza Norte',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cuanza Sul',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Cunene',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Huambo',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Huíla',
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Luanda',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Lunda Norte',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Lunda Sul',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Malanje',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Moxico',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Namibe',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Uíge',  
                'country' => 'Angola',   
            ),
            array(
                'name'    => 'Zaire',  
                'country' => 'Angola',   
            ),

        );
        
        Province::insert($data);
    }
    
}

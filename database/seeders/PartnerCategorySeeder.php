<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerCategory;

class PartnerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurante = PartnerCategory::create([
            'name'      => 'Restaurantes',
            'slug'      => 'restaurantes',
            'parent_id' => null,
            'active'    => 1,
        ]);

        $data = array(
            array('name'=>'Oriental',   'parent_id'=> $restaurante->id, 'slug' => 'oriental',   'active' => true),
            array('name'=>'Brasileira', 'parent_id'=> $restaurante->id, 'slug' => 'brasileira', 'active' => true),
        );
        
        PartnerCategory::insert($data);
    }
}

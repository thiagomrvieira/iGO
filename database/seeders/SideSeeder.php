<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Side;
use App\Models\PartnerCategory;

class SideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partnerCategory = PartnerCategory::where('slug', 'alimentos')->first();

        $data = array(
            array('name'=>'Arroz',   'category_id'=> $partnerCategory->id, 'slug' => 'arroz',   'active' => true),
            array('name'=>'Salada',  'category_id'=> $partnerCategory->id, 'slug' => 'salada',  'active' => true),
            array('name'=>'Legumes', 'category_id'=> $partnerCategory->id, 'slug' => 'legumes', 'active' => true),
        );
        
        Side::insert($data);
    }
}

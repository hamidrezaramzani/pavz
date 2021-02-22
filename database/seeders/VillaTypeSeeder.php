<?php

namespace Database\Seeders;

use App\Models\VillaType;
use Illuminate\Database\Seeder;

class VillaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["جنگلی" , "شهرکی" , "روستایی" , "کوهستانی" , "شهری" , "ساحلی " , "ییلاقی"];
        foreach ($data as $item) {
            VillaType::create([
                "name" => $item
            ]);
        }
    }
}

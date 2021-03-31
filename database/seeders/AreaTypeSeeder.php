<?php

namespace Database\Seeders;

use App\Models\AreaType;
use Illuminate\Database\Seeder;

class AreaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["مسکونی" , "کشاورزی" , "اداری و تجاری" , "صنعتی"];
        foreach ($data as $item) {
            AreaType::create(["name" => $item]);
        }
    }
}

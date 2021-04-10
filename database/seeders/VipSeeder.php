<?php

namespace Database\Seeders;

use App\Models\Vip;
use Illuminate\Database\Seeder;

class VipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["title" => "یک ماهه" , "duration" => 30 , "price" => 100000] , 
            ["title" => "سه ماهه" , "duration" => 60 , "price" => 200000] , 
            ["title" => "شش ماهه" , "duration" => 90 , "price" => 400000] , 
        ];

        foreach ($data as $item) {
            Vip::create($item);
        }
    }
}

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
            ["title" => "یک ماهه" , "duration" => 30 , "price" => 1000000] , 
            ["title" => "سه ماهه" , "duration" => 60 , "price" => 2000000] , 
            ["title" => "شش ماهه" , "duration" => 90 , "price" => 4000000] , 
        ];

        foreach ($data as $item) {
            Vip::create($item);
        }
    }
}

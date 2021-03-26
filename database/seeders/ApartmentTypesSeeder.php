<?php

namespace Database\Seeders;

use App\Models\ApartmentAccountTypes;
use App\Models\ApartmentTypes;
use Illuminate\Database\Seeder;

class ApartmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $htypes = [
            ["آپارتمان", "ویلایی", "زمین/کلنگی", "پنت هاوس", "برج", "سوییت", "معاملات"],
            ["مغازه", "زمین/کلنگی", "مستغلات", "باغ", "ویلایی"],
            ["آپارتمان", "زمین/کلنگی", "مستغلات"],
            ["کارخانه", "کارگاه", "انبار", "مستغلات", "زمین/کلنگی", "باغ"]
        ];
        foreach ($htypes as $key => $list) {
            foreach ($list as $item) {
                ApartmentTypes::create([
                    "name" => $item , 
                    "atype_id" => $key + 1
                ]);
            }
        }
    }
}

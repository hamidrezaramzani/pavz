<?php

namespace Database\Seeders;

use App\Models\ApartmentAccountTypes;
use Illuminate\Database\Seeder;

class ApartmentAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["مسکونی", "تجاری", "اداری", "صنعتی"];
        foreach ($data as $value) {
            ApartmentAccountTypes::create(["name" => $value]);
        }
    }
}

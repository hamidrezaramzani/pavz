<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DocumentTypesSeeder::class);
        $this->call(VillaTypeSeeder::class);
        $this->call(ApartmentAccountTypeSeeder::class);
        $this->call(ApartmentTypesSeeder::class);
        $this->call(AreaTypeSeeder::class);
        $this->call(VipSeeder::class);
    }
}

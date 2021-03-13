<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Seeder;

class DocumentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "سند شش دانگ",
            "سند ملکی مشاع",
            "سند منگوله دار",
            "سند تگ برگ",
            "سند اعیان",
            "سند عرصه",
            "سند وقفی",
            "سند ورثه ای ",
            "سند المثنی",
            "سند معارض",
            "سند شورایی",
            "سند وکالتی",
            "سند بنچاق",
            "سند رهنی",
            "سند دو برگ"
        ];
        foreach ($data as $type) {
            DocumentType::create(["name" => $type]);
        }
    }
}

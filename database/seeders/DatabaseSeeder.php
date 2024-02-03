<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Security;
use App\Models\SecurityType;
use App\Models\SecurityPrice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SecurityType::factory(1)->create();
        Security::factory(3)->create();
        SecurityPrice::factory(3)->create();
    }
}

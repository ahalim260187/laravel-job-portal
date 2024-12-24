<?php

namespace Database\Seeders;

use App\Models\TeamSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamSize::insert([
            ['name' => 'Only Me', 'slug' => 'only-me'],
            ['name' => '1-10', 'slug' => '1-10'],
            ['name' => '11-50', 'slug' => '11-50'],
            ['name' => '51-100', 'slug' => '51-100'],
            ['name' => '101-500', 'slug' => '101-500'],
            ['name' => '501-1000', 'slug' => '501-1000'],
            ['name' => '1001-5000', 'slug' => '1001-5000'],
            ['name' => '5001-10000', 'slug' => '5001-10000'],
            ['name' => '10001+', 'slug' => '10001'],
        ]);
    }
}

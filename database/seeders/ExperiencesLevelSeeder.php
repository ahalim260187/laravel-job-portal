<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperiencesLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            '0 Year',
            '1 Year',
            '2 Year',
            '3 Year',
            '4 Year',
            '5 Year',
            '5+ Year',
        ];
    }
}

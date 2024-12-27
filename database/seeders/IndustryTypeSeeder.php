<?php

namespace Database\Seeders;

use App\Models\IndustriType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industryTypes = [
            'Agriculture',
            'Automotive',
            'Banking',
            'Construction',
            'Education',
            'Energy',
            'Entertainment',
            'Finance',
            'Food',
            'Healthcare',
            'Hospitality',
            'Insurance',
            'Manufacturing',
            'Media',
            'Mining',
            'Pharmaceutical',
            'Real Estate',
            'Retail',
            'Technology',
            'Telecommunications',
            'Transportation',
            'Utilities',
            'Other',
        ];

        foreach ($industryTypes as $industryType) {
            IndustriType::create([
                'name' => $industryType,
            ]);
        }
    }
}

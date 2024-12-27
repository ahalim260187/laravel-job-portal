<?php

namespace Database\Seeders;

use App\Models\OrganizationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizationTypes = [
            'Government',
            'Semi Government',
            'Non-Profit',
            'Private',
            'Public',
            'NGO',
            'International Agencies',
            'Other',
        ];

        foreach ($organizationTypes as $organizationType) {
            OrganizationType::create([
                'name' => $organizationType,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'English'],
            ['name' => 'Spanish'],
            ['name' => 'French'],
            ['name' => 'German'],
            ['name' => 'Italian'],
            ['name' => 'Russian'],
            ['name' => 'Chinese'],
            ['name' => 'Japanese'],
            ['name' => 'Korean'],
            ['name' => 'Arabic'],
            ['name' => 'Hindi'],
            ['name' => 'Bengali'],
            ['name' => 'Portuguese'],
            ['name' => 'Urdu'],
            ['name' => 'Turkish'],
            ['name' => 'Vietnamese'],
            ['name' => 'Thai'],
            ['name' => 'Dutch'],
            ['name' => 'Greek'],
            ['name' => 'Polish'],
            ['name' => 'Swedish'],
            ['name' => 'Norwegian'],
            ['name' => 'Danish'],
            ['name' => 'Finnish'],
            ['name' => 'Czech'],
            ['name' => 'Hungarian'],
            ['name' => 'Romanian'],
            ['name' => 'Slovak'],
            ['name' => 'Bulgarian'],
            ['name' => 'Croatian'],
            ['name' => 'Serbian'],
            ['name' => 'Slovenian'],
            ['name' => 'Lithuanian'],
            ['name' => 'Latvian'],
            ['name' => 'Estonian'],
            ['name' => 'Maltese'],
            ['name' => 'Albanian'],
            ['name' => 'Macedonian'],
            ['name' => 'Montenegrin'],
            ['name' => 'Bosnian'],
            ['name' => 'Kurdish'],
            ['name' => 'Persian'],
            ['name' => 'Pashto'],
            ['name' => 'Dari'],
            ['name' => 'Tajik'],
            ['name' => 'Uzbek'],
            ['name' => 'Turkmen'],
            ['name' => 'Kazakh'],
            ['name' => 'Kyrgyz'],
            ['name' => 'Tatar'],
            ['name' => 'Bashkir'],
            ['name' => 'Mongolian'],
            ['name' => 'Uighur'],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}

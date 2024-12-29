<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'React.js',
            'Angular',
            'Node.js',
            'Python',
            'Django',
            'Flask',
            'Ruby',
            'Ruby on Rails',
            'Java',
            'Spring',
            'Kotlin',
            'Android',
            'Swift',
            'iOS',
            'C#',
            'ASP.NET',
            'C++',
            'C',
            'Objective-C',
            'Go',
            'Rust',
            'Scala',
            'Haskell',
            'Erlang',
            'Clojure',
            'Perl',
            'R',
            'TypeScript',
            'Dart',
            'Flutter',
            'RubyMotion',
            'Crystal',
            'Elixir',
            'Phoenix',
            'Nim',
            'Julia',
            'Lua',
            'Racket',
            'Scheme',
            'F#',
            'OCaml',
            'ReasonML',
            'Elm',
            'PureScript',
            'Haxe',
            'Pony',
            'Zig',
            'Assembly',
            'Shell',
            'PowerShell',
            'SQL',
            'NoSQL',
            'MongoDB',
            'Cassandra',
            'Redis',
            'Memcached',
            'PostgreSQL',
            'MySQL',
            'SQLite',
            'MariaDB',
            'Oracle',
            'SQL Server',
            'DB2',
            'Sybase',
            'Informix',
            'Access',
            'Firebase',
            'Firestore',
            'Realtime Database',
            'Storage',
            'Cloud Functions',
            'Hosting',
            'Authentication',
            'Cloud Messaging',
            'In-App Messaging',
            'Remote Config',
            'Dynamic Links',
            'Invites',
            'AdMob',
            'Analytics',
            'Predictions',
            'A/B Testing',
            'Crashlytics',
            'Performance Monitoring',
            'Test Lab',
            'App Distribution',
            'App Indexing',
            'Cloud Storage',
            'Cloud Functions',
            'Cloud Firestore',
            'Cloud Messaging',
        ];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}

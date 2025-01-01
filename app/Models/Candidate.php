<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'user_id',
        'full_name',
        'title',
        'experience_id',
        'website',
        'birth_date',
        'image',
        'cv',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name',
            ],
        ];
    }
}

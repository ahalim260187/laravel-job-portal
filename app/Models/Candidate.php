<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'gender',
        'marital_status',
        'profession_id',
        'status',
        'bio',
    ];

    function skills(): HasMany
    {
        return $this->hasMany(CandidateSkill::class);
    }

    function languages(): HasMany
    {
        return $this->hasMany(CandidateLanguage::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name',
            ],
        ];
    }
}

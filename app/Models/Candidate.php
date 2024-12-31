<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'full_name', 'title', 'experience_id', 'website', 'birth_date', 'image', 'cv'];
}

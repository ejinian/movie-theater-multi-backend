<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'theater_movie'; // Use the prefixed table name
    public $timestamps = false;

    protected $fillable = [
        'title',
        'genre',
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'movie_id');
    }
}

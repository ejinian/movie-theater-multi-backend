<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'theater_sales'; // Use the prefixed table name
    public $timestamps = false;

    protected $fillable = [
        'theater_id',
        'movie_id',
        'date',
        'tickets_sold',
    ];

    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}

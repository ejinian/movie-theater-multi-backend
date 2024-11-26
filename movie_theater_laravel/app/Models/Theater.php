<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theater extends Model
{
    use HasFactory;
    protected $table = 'theater_theater'; // Use the prefixed table name
    public $timestamps = false;

    protected $fillable = [
        'name',
        'location',
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'theater_id');
    }
}

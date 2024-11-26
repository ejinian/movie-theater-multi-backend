<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theater;
use App\Models\Movie;
use App\Models\Sales;

use Illuminate\Support\Facades\Config;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $databasePath = realpath(base_path('../db.sqlite3'));
        if ($databasePath === false) {
            throw new \Exception("Database file not found at ../../db.sqlite3");
        }

        Config::set('database.connections.sqlite.database', $databasePath);

        Theater::factory(10)->create();
        Movie::factory(10)->create();
        Sales::factory(50)->create();
    }
}

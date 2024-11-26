<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheaterController;

Route::get('/top-theater/{date}', [TheaterController::class, 'topTheaterByDate']);

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class TheaterController extends Controller
{
    public function topTheaterByDate($date)
    {
        $topSale = Sales::where('date', $date)
            ->with(['theater', 'movie'])
            ->orderByDesc('tickets_sold')
            ->first();

        if ($topSale) {
            return response()->json([
                'theater' => $topSale->theater->name,
                'movie' => $topSale->movie->title,
                'tickets_sold' => $topSale->tickets_sold,
            ]);
        } else {
            return response()->json(['error' => 'No sales found for this date.'], 404);
        }
    }
}

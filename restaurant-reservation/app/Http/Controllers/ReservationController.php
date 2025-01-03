<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $reservation = Reservation::create($validated);
        return response()->json($reservation, 201);
    }
}

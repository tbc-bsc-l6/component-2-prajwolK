<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index(){
        $reservations = Reservation::where('user_id', Auth::id())->get(); // Get reservations for the logged-in user
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        //Get all available tables
        $tables = Table::all();
        return view('reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        //Validate the input data
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        //Check if the table is available for selected time and date
        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'The table is already reserved at this time.');
        }

        //Create a new reservation
        $reservation = Reservation::create([
            'user_id' => Auth::id(), //Automatically associate the logged-in user
            'table_id' => $request->table_id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => Reservation::STATUS_PENDING, // Default status is 'pending'
        ]);

        return redirect()->route('reservation.index')->with('success', 'Reservation created successfully!');
    }
}

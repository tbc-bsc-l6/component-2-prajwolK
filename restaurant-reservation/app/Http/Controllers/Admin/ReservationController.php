<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['table', 'user'])->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', true)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|string',
        ]);

        $table = Table::find($request->table_id);
        if(!$table){
            return redirect()->back()->withErrors(['table_is' => 'Selected table does not exist']);
        }

        // Reservation::create($request->all());
        $reservation = new Reservation();
        $reservation->table_id =$table->id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->status = $request->status;
        $reservation->user_id = auth()->id();
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', true)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|string',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}

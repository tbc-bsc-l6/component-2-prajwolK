<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reservationsCount = Reservation::count();
        $tablesCount = Table::count();

        return view('admin.dashboard', compact('reservationsCount', 'tablesCount'));
    }
}

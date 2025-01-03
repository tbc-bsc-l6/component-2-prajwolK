<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\JsonResponse;


class TableController extends Controller
{
    public function index(): JsonResponse
    {
        $tables = Table::all();
        return response()->json($tables);
    }
}

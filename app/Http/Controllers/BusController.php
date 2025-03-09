<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Schedule;
use App\Models\Stop;
use App\Services\BusService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class BusController extends Controller
{
    public function find_bus(Request $request){
        $request->validate([
            'from' => 'required|exists:stops,id',
            'to' => 'required|exists:stops,id',
        ]);

        $from = $request->input('from');
        $to = $request->input('to');

        $buses = new BusService();

        return response()->json(array(
            'from' => Stop::find($from)->name,
            'to' =>Stop::find($to)->name,
            'buses' => $buses->findBuses($from, $to)
        ));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Schedule;
use App\Models\Stop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function find_bus(Request $request){
        $request->validate([
            'from' => 'required|exists:stops,id',
            'to' => 'required|exists:stops,id',
        ]);

        $from = $request->input('from');
        $to = $request->input('to');

        $routes = Route::whereHas('stops', function ($query) use ($from) {
            $query->where('stop_id', $from);
        })
            ->whereHas('stops', function ($query) use ($to) {
                $query->where('stop_id', $to);
            })->get();

        $result = [];
        $now = Carbon::now()->format('H:i');

        foreach ($routes as $route) {
            $stops = $route->stops()->orderBy('sequence')->get();

            $fromSequence = $stops->where('id', $from)->first()->pivot->sequence;
            $toSequence = $stops->where('id', $to)->first()->pivot->sequence;

            if ($fromSequence >= $toSequence) {
                continue;
            }

            $schedule = Schedule::where('route_id', $route->id)
                ->where('stop_id', $from)
                ->where('arrival_time', '>=', $now)
                ->orderBy('arrival_time')
                ->limit(3)
                ->get();

            if ($schedule->isEmpty()) {
                continue;
            }

            $result[] = [
                'route' => "Автобус №{$route->number} в сторону {$route->direction}",
                'next' => $schedule->pluck('arrival_time')->toArray(),
                ];
        }

        return response()->json([
            'from' => Stop::find($from)->name,
            'to' =>Stop::find($to)->name,
            'buses' => $result
        ]);
    }
}

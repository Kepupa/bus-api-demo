<?php
namespace App\Services;

use App\Models\Route;
use App\Models\Schedule;
use App\Models\RouteStop;
use App\Models\Stop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusService
{
    public function findBuses($from, $to){
        $routes = Route::whereHas('stops', function ($query) use ($from) {
            $query->where('stop_id', $from);
        })
            ->whereHas('stops', function ($query) use ($to) {
                $query->where('stop_id', $to);
            })->get();

        $result = [];


        foreach ($routes as $route) {
            $stops = $route->stops()->orderBy('sequence')->get();

            $fromSequence = $stops->where('id', $from)->first()->pivot->sequence;
            $toSequence = $stops->where('id', $to)->first()->pivot->sequence;

            if ($fromSequence >= $toSequence) {
                continue;
            }

            $schedule = Schedule::where('route_id', $route->id)
                ->where('stop_id', $from)
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
        return $result;
    }
}

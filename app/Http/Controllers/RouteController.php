<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return response()->json(Route::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string',
            'direction' => 'required|string'
        ]);

        $route = Route::create([
            'number' => $request->number,
            'direction' => $request->direction
        ]);

        return response()->json($route, 201);
    }

    public function show($id)
    {
        $route = Route::findOrFail($id);
        return response()->json($route);
    }

    public function update(Request $request, $id)
    {
        $route = Route::findOrFail($id);
        $request->validate([
            'number' => 'required|string',
            'direction' => 'required|string',
        ]);
        $route->update([$request->only('number', 'direction')]);
        return response()->json($route);
    }

    public function destroy($id){
        Route::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function addStop(Request $request, $id)
    {
        $route = Route::findOrFail($id);
        $request->validate([
            'stop_id' => 'required|exists:stops,id',
            'sequence' => 'required|integer|min:1',
        ]);

        $route->stops()->attach($request->stop_id, ['sequence' => $request->sequence]);
        return response()->json($route->stops()->orderBy('sequence')->get());
    }

    public function removeStop($id, $stop_id)
    {
        $route = Route::findOrFail($id);
        $route->stops()->detach($stop_id);
        return response()->json($route->stops()->orderBy('sequence')->get());
    }

}

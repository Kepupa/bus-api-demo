<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function updateRouteStops(Request $request, Route $route)
    {
        // Валидация входных данных
        $request->validate([
            'stops' => 'required|array',
            'stops.*' => 'exists:stops,id',
        ]);

        // Удаляем все существующие остановки маршрута
        $route->stops()->detach();

        // Добавляем новые остановки с порядком
        foreach ($request->stops as $index => $stopId) {
            $route->stops()->attach($stopId, ['sequence' => $index + 1]);
        }

        return response()->json([
            'message' => 'Остановки маршрута успешно обновлены',
            'route' => $route,
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'stop_id', 'arrival_time'];

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function stop(){
        return $this->belongsTo(Stop::class);
    }
}

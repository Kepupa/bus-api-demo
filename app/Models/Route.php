<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'direction'];

    public function stops(){
        return $this->belongsToMany(Stop::class, 'route_stops')
                    ->withPivot('sequence')
                    ->orderBy('sequence');
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}

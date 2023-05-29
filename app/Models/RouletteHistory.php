<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouletteHistory extends Model
{
    use HasFactory;
    protected $table='roulette_history';
    protected $fillable = [
        'player_id',
        'random',
        'degrees',
        'data',
        'award'
    ];
   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouletteHistory extends Model
{
    use HasFactory;
    protected $table='roulette_history';
    public $timestamps = false;
    protected $fillable = [
        'player_id',
        'random',
        'degrees',
        'created_at',
        'award'
    ];
   
}

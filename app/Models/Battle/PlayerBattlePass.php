<?php

namespace App\Models\Battle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerBattlePass extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $primaryKey = 'player_id';
    protected $table = "player_battle_pass";
    protected $fillable = [
        'player_id',
        'initial_exp',
        'battle_exp'
    ];
}

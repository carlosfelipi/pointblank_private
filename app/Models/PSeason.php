<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PSeason extends Model
{
    use HasFactory;
    protected $primaryKey = 'player_id';

    protected $table = 'player_season';

    protected $fillable = [
        'player_id',
        'player_name',
        'player_rank',
        'initial_exp',
        'season_exp',
        'initial_fights',
        'season_fights',
        'initial_fights_win',
        'season_fights_win',
        'initial_fights_lost',
        'season_fights_lost',
        'initial_kills_count',
        'season_kills_count',
        'initial_deaths_count',
        'season_deaths_count',
        'initial_headshots_count',
        'season_headshots_count',
        'initial_escapes',
        'season_escapes',
        'initial_fights_draw',
        'season_fights_draw',
        'initial_totalkills_count',
        'season_totalkills_count',
        'initial_totalfights_count',
        'season_totalfights_count',
        'initial_gp',
        'season_gp',
        'initial_coin',
        'season_coin',
        'initial_money',
        'season_money',
    ];
}

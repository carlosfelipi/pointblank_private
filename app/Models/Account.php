<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'player_id';
    protected $fillable = [
        'login',
        'password',
        'player_id',
        'player_name',
        'name_color',
        'clan_id',
        'rank',
        'gp',
        'pc_cafe',
        'fights',
        'fights_win',
        'fights_lost',
        'kills_count',
        'deaths_count',
        'headshots_count',
        'escapes',
        'access_level',
        'lastip',
        'email',
        'last_rankup_date',
        'money',
        'online',
        'weapon_primary',
        'weapon_secondary',
        'weapon_melee',
        'weapon_thrown_normal',
        'weapon_thrown_special',
        'char_red',
        'char_blue',
        'char_helmet',
        'char_dino',
        'char_beret',
        'brooch',
        'insignia',
        'medal',
        'blue_order',
        'mission_id1',
        'clanaccess',
        'clandate',
        'effects',
        'fights_draw',
        'mission_id2',
        'mission_id3',
        'totalkills_count',
        'totalfights_count',
        'status',
        'last_login',
        'clan_game_pt',
        'clan_wins_pt',
        'last_mac',
        'ban_obj_id',
        'access_admin',
        'remember_token',
        'remember_date',
        'created_at',
        'access_admin',
        'coin',
        'provider'
    ];
}

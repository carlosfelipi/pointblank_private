<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerTitles extends Model
{
    use HasFactory;
    protected $table = 'player_titles';
    public $timestamps = false;
    protected $primaryKey = 'owner_id';
}

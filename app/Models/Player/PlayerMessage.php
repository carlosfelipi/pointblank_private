<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerMessage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'owner_id';
    protected $table = 'player_messages';
}

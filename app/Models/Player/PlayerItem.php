<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerItem extends Model
{
    use HasFactory;
    protected $table = 'player_items';
    public $timestamps = false;
    protected $primaryKey = 'object_id';
}

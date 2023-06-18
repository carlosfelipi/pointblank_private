<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clan extends Model
{
    use HasFactory;
    protected $table = 'clan_data';
    protected $primaryKey = 'clan_id';
}

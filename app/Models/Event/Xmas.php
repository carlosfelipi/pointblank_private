<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xmas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'event_id';
    protected $table = 'events_xmas';
}
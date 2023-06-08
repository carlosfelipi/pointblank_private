<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    use HasFactory;
    protected $table = 'accounts_temporary';
    public $timestamps = false;
    protected $fillable = [
        'login',
        'password',
        'email',
        'token',
        'created_at',
        'expired_at'
    ];
}

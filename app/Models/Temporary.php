<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = 'accounts_temporary';

    protected $fillable = [
        'login',
        'password',
        'email',
        'token',
        'expired_at'
    ];
}

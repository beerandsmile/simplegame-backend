<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'hash', 'player_1', 'player_2', 'winner', 'roll', 'state',
    ];
}

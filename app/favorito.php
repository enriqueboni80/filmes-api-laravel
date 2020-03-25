<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favorito extends Model
{
    protected $fillable = [
        'user_id',
        'movie_id'
    ];
}

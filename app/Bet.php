<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = ['libmatch','libbet', 'oddofbet', 'stateofbet', 'betsum',  'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

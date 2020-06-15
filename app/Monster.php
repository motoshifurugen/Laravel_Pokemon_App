<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Monster extends Model
{
    // use Favoriteable;
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}

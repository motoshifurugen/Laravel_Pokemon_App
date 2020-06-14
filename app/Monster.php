<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}

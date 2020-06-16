<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Kyslik\ColumnSortable\Sortable;

class Monster extends Model
{
    use Sortable;
    // use Favoriteable;

    public $sortable = [
        'size',
        'weight'
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'symbol',
        'inOtherUnits',
        'inBaseUnits'
    ];

    public function parameters() {
        return $this->hasMany('App\Parameter');
    }

    public function pluckNames($noneValue = null) {
        $plucks = $this->orderBy('name')->pluck('name', 'id');
        $array = $plucks->toArray();
        if($noneValue) {
            $array[0] = $noneValue;
        }
        return $array;
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'symbol',
        'quantity',
        'inOtherUnits',
        'inBaseUnits'
    ];

    public function parameters() {
        return $this->hasMany('App\Parameter');
    }

    public function pluckNames($orderBy = 'name') {
        return $this->orderBy('name')->pluck('name', 'id');
    }
}

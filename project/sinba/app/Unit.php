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
}

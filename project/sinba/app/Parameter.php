<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = [
        'name',
        'unit_id'
    ];

    public function unit() {
        return $this->belongsTo('App\Unit');
    }

    public function unitName() {

        if(is_null($this->unit_id)) {
            return "";
        }
        return $this->unit->name;
    }

    public function symbol() {

        if(is_null($this->unit_id)) {
            return "";
        }
        return $this->unit->symbol;
    }

    public function nameAndSymbol() {
        $symbol = $this->symbol();
        return $this->name . (strlen($this->symbol()) ? " ($symbol)" : '');
    }

    public function pluckNames($noneValue = null) {
        $plucks = $this->orderBy('name')->pluck('name', 'id');
        $array = $plucks->toArray();
        if($noneValue) {
            $array[0] = $noneValue;
        }
        return $array;
    }

    public function pluckNamesAndSymbols($noneValue = null) {
        $parameters = $this->orderBy('name')->get();
        $paramArray = [];
        foreach($parameters as $parameter) {
            $paramArray[$parameter->id] = $parameter->nameAndSymbol();
        }
        return $paramArray;
    }
}

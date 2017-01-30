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
}

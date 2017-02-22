<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watershed extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id'
    ];

    public function parent() {
        return $this->belongsTo('App\Watershed', 'parent_id');
    }

    public function data() {
        return $this->hasMany('App\Data');
    }

    public function pluckNames($noneValue = null) {
        $plucks = $this->orderBy('name')->pluck('name', 'id');
        $array = $plucks->toArray();
        if($noneValue) {
            $array[0] = $noneValue;
        }
        return $array;
    }

    public function pluckOtherNames($noneValue = null) {
        $plucks = $this->where('name', '<>', $this->name)->orderBy('name')->pluck('name', 'id');
        $array = $plucks->toArray();
        if($noneValue) {
            $array[0] = $noneValue;
        }
        return $array;
    }
}

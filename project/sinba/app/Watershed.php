<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watershed extends Model
{
    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    public function parent() {
        return $this->belongsTo('App\Watershed');
    }
}

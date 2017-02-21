<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $fillable = [
        'name',
        'layout_header_in_first_column'
    ];

    public function parameters() {
        return $this->belongsToMany(Parameter::class)->withPivot('label', 'sequence');
    }

    public function addParameter($parameterId) {
        $this->parameters()->attach($parameterId, ['quantity' => 1]);
    }

}

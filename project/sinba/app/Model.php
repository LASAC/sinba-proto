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
        // TODO: implement it.
        $this->parameters()->attach($parameterId, ['quantity' => 1]);
        // $this->parameters()->attach([$parameterId, [1 => ['quantity' => 1]]],[],...);
        // $this->products()->detach($productId);
        // $this->products()->updateExistingPivot($productId, ['quantity' => $newQuantity]);
    }

}

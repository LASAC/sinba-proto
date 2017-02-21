<?php
/**
 * Created by PhpStorm.
 * User: mariliack
 * Date: 21/02/17
 * Time: 01:13
 */

namespace App\Transformers;


use App\Parameter;

class ParameterTransformer
{
    public function transformModelParametersAndLabels($parameters) {
        $transformedParameters = [];
        $transformedLabels = [];
        foreach($parameters as $parameter) {
            if ($parameter instanceof Parameter) {
                $index = $parameter->pivot ? $parameter->pivot->sequence : $parameter->id;
                $transformedParameters[$index] = $this->transformModelParameter($parameter);
                $transformedLabels[$index] = $this->transformModelLabel($parameter);
            }
        }
        return [$transformedParameters, $transformedLabels];
    }

    private function transformModelParameter($parameter) {
        return [
            'id' => $parameter->id,
            'name' => $parameter->name
        ];
    }

    private function transformModelLabel($parameter) {
        return [
            'parameterId' => $parameter->id,
            'label' => $parameter->pivot->label,
            'sequence' => $parameter->pivot->sequence
        ];
    }

    public function getLabels($parameters) {
        $transformedLabels = [];
        foreach($parameters as $parameter) {
            if ($parameter instanceof Parameter) {
                $index = $parameter->pivot ? $parameter->pivot->sequence : $parameter->id;
                $transformedParameters[$index] = $parameter->pivot->label;
            }
        }
        return $transformedLabels;
    }
}
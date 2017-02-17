<?php

namespace App\Transformers;

use App\Model;
use App\Parameter;

class ModelTransformer
{
    public function transformModels($models) {
        $modelsTransformed = [];
        foreach ($models as $model) {
            $modelsTransformed[] = $this->transformModel($model);
        }
        return $modelsTransformed;
    }

    private function transformModel($model) {
        $transformed = null;
        if ($model instanceof Model) {
            $transformed = [
                'id' => $model->id,
                'name' => $model->name,
                'layout_header_in_first_column' => $model->layout_header_in_first_column,
            ];
            list($transformed['parameters'], $transformed['labels']) =
                $this->transformModelParametersAndLabels($model->parameters);
        }
        return $transformed;
    }

    private function transformModelParametersAndLabels($parameters) {
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
            'parameter_id' => $parameter->id,
            'label' => $parameter->pivot->label,
            'sequence' => $parameter->pivot->sequence
        ];
    }
}
<?php

namespace App\Transformers;

use App\Model;
use App\Parameter;

class ModelTransformer
{
    protected $parameterTransformer;

    function __construct()
    {
        $this->parameterTransformer = new ParameterTransformer();
    }

    public function transformModels($models) {
        $modelsTransformed = [];
        foreach ($models as $model) {
            $modelsTransformed[] = $this->transformModel($model);
        }
        return $modelsTransformed;
    }

    public function transformModel($model) {
        $transformed = null;
        if ($model instanceof Model) {
            $transformed = [
                'id' => $model->id,
                'name' => $model->name,
                'layout_header_in_first_column' => $model->layout_header_in_first_column,
            ];
            list($transformed['parameters'], $transformed['labels']) =
                $this->parameterTransformer->transformModelParametersAndLabels($model->parameters);
        }
        return $transformed;
    }
}
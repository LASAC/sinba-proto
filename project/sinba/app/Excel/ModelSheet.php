<?php
/**
 * Created by PhpStorm.
 * User: mariliack
 * Date: 21/02/17
 * Time: 00:48
 */

namespace App\Excel;


use App\Model;
use App\Transformers\ParameterTransformer;

class ModelSheet extends SingleSheet
{
    protected $model;
    protected $parameterTransformer;
    function __construct(Model $model)
    {
        $this->model = $model;
        $this->parameterTransformer = new ParameterTransformer();
    }

    /**
     * @return string[]
     */
    public function labels()
    {
        return $this->parameterTransformer->getLabels($this->model->parameters);
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->model->name;
    }

    /**
     * @return string
     */
    public function fileName()
    {
        return $this->model->name;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->model->name;
    }
}
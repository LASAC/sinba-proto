<?php

namespace App\Http\Controllers;


use App\Excel\ExcelCreator;
use App\Excel\ModelSheet;
use App\Model;
use App\Transformers\ExceptionTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExcelFileController extends Controller
{
    protected $excelCreator;
    protected $exceptionTransformer;
    protected $model;
    protected $request;

    public function __construct (
        ExceptionTransformer $exceptionTransformer,
        Model $model,
        Request $request
    ) {
        $this->excelCreator = new ExcelCreator('MariliaCK');
        $this->exceptionTransformer = $exceptionTransformer;
        $this->model = $model;
        $this->request = $request;
    }

    public function download ($modelId) {
        Log::debug('EXCEL FILE CONTROLLER:' . $modelId);
        $model = $this->model->with('parameters')->findOrFail($modelId);
        $modelSheet = new ModelSheet($model);
        return $this->excelCreator->create($modelSheet)->download('xls');
    }
}
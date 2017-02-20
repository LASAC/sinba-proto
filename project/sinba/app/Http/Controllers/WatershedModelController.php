<?php

namespace App\Http\Controllers;

use App\Model;
use App\Parameter;
use App\Transformers\ExceptionTransformer;
use App\Transformers\ModelTransformer;
use App\Watershed;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WatershedModelController extends Controller
{
    protected $request;
    protected $session;
    protected $watershed;
    protected $parameter;
    protected $model;
    protected $modelTransformer;
    protected $exceptionTransformer;

    public function __construct(
        Request $request,
        Watershed $watershed,
        Parameter $parameter,
        Model $model,
        ModelTransformer $modelTransformer,
        ExceptionTransformer $exceptionTransformer
    )
    {
        $this->request = $request;
        $this->session = session();
        $this->watershed = $watershed;
        $this->parameter = $parameter;
        $this->model = $model;
        $this->modelTransformer = $modelTransformer;
        $this->exceptionTransformer = $exceptionTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->request->expectsJson()) {
            $models = $this->model->with('parameters')->get();
            $modelsTransformed = $this->modelTransformer->transformModels($models);
            Log::debug("WATERSHED MODEL CONTROLLER - SENDING JSON:");
            Log::debug(json_encode($modelsTransformed));
            return response()->json($modelsTransformed, 200);
        }
        return view('home');
    }

    /**
     * NOT IMPLEMENTED: Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Log::debug("STORE MODEL: $this->request");
        return $this->saveModel();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Log::debug("STORE MODEL ($id): $this->request");
        $this->model = $this->model->findOrFail($id);

        return $this->saveModel();
    }

    private function saveModel() {
        // criar modelo no banco de dados (tabela: models)
        $this->model->name = $this->request->name;
        $this->model->layout_header_in_first_column = $this->request->layout_header_in_first_column;
        $this->model->save();

        $toSync = [];
        foreach ($this->request->labels as $sequence => $label) {
            $toSync[$label['parameterId']] = ['label' => $label['label'], 'sequence' => $sequence];
        }

        $this->model->parameters()->sync($toSync);

        return response(['message' => trans('strings.modelExportSuccess'), 'synced' => $toSync]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // para requisição por JS retorna os dados do Modelo
        if($this->request->expectsJson()) {
            return $this->showModel($id);
        }

        // para requisição normal retorna os dados da Bacia.
        $watershedId = $id;
        $watershed = $this->watershed->findOrFail($watershedId);
        Log::debug('INICIANDO TRATAMENTO DO SHOW (watershed):' . json_encode($watershed));
        return view('watersheds.model', [
            'watershed' => $watershed,
            'parent' => $watershed->parent,
            'parameters' => $this->parameter->pluckNamesAndSymbols()
        ]);
    }

    private function showModel($id) {
        Log::debug("WATERSHED MODEL CONTROLLER - SENDING JSON:");
        try {
            $model = $this->model->with('parameters')->findOrFail($id);
            $modelTransformed = $this->modelTransformer->transformModel($model);
            Log::debug('MODEL TRANSFORMED:' . json_encode($modelTransformed));
            return response($modelTransformed, 200);
        }
        catch (ModelNotFoundException $exception) {
            $error = $this->exceptionTransformer->transform($exception);
            return response([
                'message' => trans('strings.modelDeleteFail'),
                'error' => $error
            ], 400);
        }
    }

    /**
     * NOT IMPLEMENTED: Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug("INICIANDO TRATAMENTO DO DELETE: $id");
        $deleted = false;
        $error = null;

        try {
            $deleted = $this->model->destroy($id);
        }
        catch(\PDOException $exception) {
            $error = $this->exceptionTransformer->transform($exception);
        }

        if($deleted) {
            return response(['message' => trans('strings.modelDeleteSuccess')], 200);
        }

        return response([
            'message' => trans('strings.modelDeleteFail'),
            'error' => $error
        ], 400);
    }
}

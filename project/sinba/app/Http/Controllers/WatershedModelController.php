<?php

namespace App\Http\Controllers;

use App\Model;
use App\Parameter;
use App\Watershed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WatershedModelController extends Controller
{
    protected $request;
    protected $session;
    protected $watershed;
    protected $model;
    protected $parameter;

    public function __construct(Request $request, Watershed $watershed, Model $model, Parameter $parameter)
    {
        $this->request = $request;
        $this->session = session();
        $this->watershed = $watershed;
        $this->model = $model;
        $this->parameter = $parameter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
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
    Log::debug('INICIANDO TRATAMENTO DO SHOW');
    $watershed = $this->watershed->findOrFail($id);

    return view('watersheds.model', [
        'watershed' => $watershed,
        'parent' => $watershed->parent,
        'parameters' => $this->parameter->pluckNamesAndSymbols()
    ]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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

    }

    public function search()
    {

    }

    protected function validateRequest($isUpdate = false)
    {

    }
}

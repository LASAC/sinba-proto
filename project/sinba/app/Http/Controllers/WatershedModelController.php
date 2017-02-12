<?php

namespace App\Http\Controllers;

use App\Parameter;
use App\Watershed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WatershedModelController extends Controller
{
    protected $request;
    protected $session;
    protected $watershed;
    protected $parameter;

    public function __construct(Request $request, Watershed $watershed, Parameter $parameter)
    {
        $this->request = $request;
        $this->session = session();
        $this->watershed = $watershed;
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
        // adicionar parâmetros relacionados ao modelo no banco de dados (tabela: model_parameters)

        return response(['message' => trans('strings.modelExportSuccess')]);
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

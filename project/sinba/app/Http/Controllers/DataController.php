<?php

namespace App\Http\Controllers;

use App\Data;
use App\Watershed;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    protected $model;
    protected $request;
    protected $session;

    public function __construct(Request $request, Data $data)
    {
        $this->request = $request;
        $this->session = session();
        $this->model = $data;
    }

    public function fromWatershed($watershedId, $userId) {
        $this->session->flash('search_watershed_id', $watershedId);
        $this->session->flash('search_user_id', $userId);
        $data = $this->searchByIds(
            null,
            $userId,
            $watershedId
        );
        return $this->index($data);
    }

    public function export() {

        $data = $this->searchByIds(
            $this->request->input('parameter_id'),
            $this->request->input('user_id'),
            $this->request->input('watershed_id')
        );

        return Excel::create('SINBA_Dados', function($excel) use($data) {
            $excel->sheet('Sheet 1', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

    public function search()
    {
        $watershedId = $this->request->input('search_watershed_id');
        $userId = $this->request->input('search_user_id');
        $parameterId = $this->request->input('search_parameter_id');

        $data = $this->searchByIds(
            $parameterId,
            $userId,
            $watershedId
        );

        if($data->isEmpty()) {
            $this->session->flash('message_info', trans('strings.noItemsFound'));
        }

        $this->session->flash('search_watershed_id', $watershedId);
        $this->session->flash('search_user_id', $userId);
        $this->session->flash('search_parameter_id', $parameterId);

        return $this->index($data);
    }

    private function searchByIds($parameterId = null, $userId = null, $watershedId = null) {
        $query = $query = Data::orderBy('watershed_id');
        if ($watershedId) {
            $watershed = Watershed::with('data')->get()->find($watershedId);
            $query = $watershed->data();
        }

        if ($userId) {
            $query = $query->where('user_id', $userId);
        }
        if ($parameterId) {
            $query = $query->where('parameter_id', $parameterId);
        }

        return $query->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Data[]|null $models
     * @return \Illuminate\Http\Response
     */
    public function index($models = null)
    {
        if(!isset($models)) {
            $models = [];
            $this->session->flash('message_info', trans('strings.clickSearch'));
        }

        return view('data.list', [
            'data' => $models
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.edit', [
            'title' => trans('strings.edit'),
            'url' => 'data',
            'method' => 'post',
            'saveEnabled' => true,
            'readonly' => '',
            'model' => new Data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validateRequest();
        Data::create($this->request->all());
        $this->session->flash('message_success', trans('strings.saveSuccess'));
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->model->with('parameter', 'registeredBy', 'watershed')->findOrFail($id);
        return view('data.edit', [
            'title' => trans('strings.view'),
            'url' => 'data',
            'method' => 'get',
            'saveEnabled' => false,
            'readonly' => 'readonly',
            'model' => $model
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
        return view('data.edit', [
            'title' => trans('strings.edit'),
            'url' => "data/$id",
            'method' => 'patch',
            'saveEnabled' => true,
            'readonly' => '',
            'model' => $this->model->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validateRequest();
        $this->model = $this->model->findOrFail($id);

        $updated = $this->model->update($this->request->all());

        if($updated) {
            $this->session->flash('message_success', trans('strings.updatedSuccess'));
        }
        else {
            $this->session->flash('message_danger', trans('strings.updatedSuccess'));
        }

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model->find($id);
        $model->delete();
        $this->session->flash('message_success', trans('strings.deletedSuccess'));
        return $this->index();
    }

    protected function validateRequest()
    {
        return Data::validator($this->request->all());
    }
}

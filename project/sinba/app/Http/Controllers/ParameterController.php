<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parameter;

class ParameterController extends CRUDController
{
    public function __construct(Request $request, Parameter $parameter)
    {
        parent::__construct($request);
        $this->model = $parameter;
    }

    protected function listView()
    {
        return 'parameters.list';
    }

    protected function editView()
    {
        return 'parameters.edit';
    }

    protected function collectionName()
    {
        return 'parameters';
    }

    protected function columnToSort()
    {
        return 'name';
    }

    protected function newModel()
    {
        return new Parameter();
    }

    protected function validateRequest($isUpdate = false)
    {
        $id = $isUpdate ? ", " . $this->request->input('id') : '';
        $this->validate($this->request, [
            'name' => 'required|max:255|unique:units,name' . $id
        ]);
    }

    public function store()
    {
        $this->validateRequest();
        Parameter::create([
            'name' => $this->request->input('name'),
            'unit_id' => $this->request->input('unit_id') > 0 ? $this->request->input('unit_id') : null
        ]);

        $this->session->flash('message_success', trans('strings.saveSuccess'));

        return $this->index();
    }

    public function update($id)
    {
        $this->validateRequest(true);
        $this->model = $this->model->findOrFail($id);

        $updated = $this->model->update([
            'name' => $this->request->input('name'),
            'unit_id' => $this->request->input('unit_id') > 0 ? $this->request->input('unit_id') : null
        ]);

        if($updated) {
            $this->session->flash('message_success', trans('strings.updatedSuccess'));
        }
        else {
            $this->session->flash('message_danger', trans('strings.updatedSuccess'));
        }

        return $this->index();
    }

    /**
     * Display a listing of the resource.
     *
     * @param null $models
     * @return \Illuminate\Http\Response
     */
    public function index($models = null) {

        if(!isset($models)) {
            $models = $this->model->orderBy($this->columnToSort())->with('unit')->get();
        }
        return view($this->listView(), [
            $this->collectionName() => $models
        ]);
    }

    public function search() {

        $units = $this->model
            ->where('name', 'LIKE', '%' . $this->request->input('search') . '%')
            ->orderBy($this->columnToSort())
            ->get();
        if($units->isEmpty()) {
            $this->session->flash('message_info', trans('strings.noItemsFound'));
        }

        $this->session->flash('search', '');
        if(mb_strlen($this->request->input('search')) > 0) {
            $this->session->flash('search', $this->request->input('search'));
        }

        return $this->index($units);
    }
}
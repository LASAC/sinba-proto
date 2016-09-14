<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Unit;

class UnitController extends CRUDController
{
    public function __construct(Request $request, Unit $unit)
    {
        parent::__construct($request);
        $this->model = $unit;
    }

    protected function validateRequest($isUpdate = false) {
        $id = $isUpdate ? ", " . $this->request->input('id') : '';
        $this->validate($this->request, [
            'name' => 'required|max:255|unique:units,name' . $id,
            'symbol' => 'max:15',
            'quantity' => 'max:127',
            'inBaseUnits' => 'max:63',
            'inOtherUnits' => 'max:63'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store()
    {
        $this->validateRequest();
        Unit::create([
            'name' => $this->request->input('name'),
            'symbol' => $this->request->input('symbol'),
            'quantity' => $this->request->input('quantity'),
            'inBaseUnits' => $this->request->input('inBaseUnits'),
            'inOtherUnits' => $this->request->input('inOtherUnits')
        ]);

        $this->session->flash('message_success', trans('strings.saveSuccess'));

        return $this->index();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update($id)
    {
        $this->validateRequest(true);
        $this->model = $this->model->findOrFail($id);
        $updated = $this->model->update([
            'name' => $this->request->input('name'),
            'symbol' => $this->request->input('symbol'),
            'quantity' => $this->request->input('quantity'),
            'inBaseUnits' => $this->request->input('inBaseUnits'),
            'inOtherUnits' => $this->request->input('inOtherUnits')
        ]);

        if($updated) {
            $this->session->flash('message_success', trans('strings.updatedSuccess'));
        }
        else {
            $this->session->flash('message_danger', trans('strings.updatedSuccess'));
        }

        return $this->index();
    }

    public function search() {

        $units = $this->model
            ->where('name', 'LIKE', '%' . $this->request->input('search') . '%')
            ->orWhere('symbol', 'LIKE', '%' . $this->request->input('search') . '%')
            ->orWhere('quantity', 'LIKE', '%' . $this->request->input('search') . '%')
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

    protected function listView()
    {
        return 'units.list';
    }

    protected function editView()
    {
        return 'units.edit';
    }

    protected function columnToSort()
    {
        return 'name';
    }

    protected function collectionName()
    {
        return 'units';
    }

    protected function createViewTitle()
    {
        return trans('strings.createUnit');
    }

    protected function editViewTitle()
    {
        return trans('strings.editUnit');
    }

    protected function showViewTitle()
    {
        return trans('strings.editUnit');
    }

    protected function newModel()
    {
        return new Unit();
    }
}

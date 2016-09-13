<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Unit;

class UnitController extends Controller
{
    private $request;
    private $unit;
    private $session;

    public function __construct(Request $request, Unit $unit)
    {
        $this->request = $request;
        $this->unit = $unit;
        $this->session = Session();
    }

    /**
     * Display a listing of the resource.
     *
     * @param null $units
     * @return \Illuminate\Http\Response
     */
    public function index($units = null)
    {
        if(!isset($units)) {
            $units = $this->unit->orderBy('name')->get();
        }
        return view('units.list', [
            'units' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.edit', [
            'title' => trans('strings.createUnit'),
            'url' => 'units',
            'method' => 'post',
            'saveEnabled' => true,
            'attributes' => [],
            'unit' => new Unit]);
    }

    private function validateRequest() {
        $this->validate($this->request, [
            'name' => 'required|unique:units|max:255',
            'symbol' => 'max:15'
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
            'symbol' => $this->request->input('symbol')
        ]);

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
        return view('units.edit', [
            'title' => trans('strings.showUnit'),
            'url' => 'units',
            'method' => 'get',
            'saveEnabled' => false,
            'attributes' => ['readonly'],
            'unit' => $this->unit->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('units.edit', [
            'title' => trans('strings.editUnit'),
            'url' => "units/$id",
            'method' => 'put',
            'saveEnabled' => true,
            'attributes' => [],
            'unit' => $this->unit->findOrFail($id)]);
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
        $this->validateRequest();
        $this->unit = $this->unit->findOrFail($id);
        $updated = $this->unit->update([
            'name' => $this->request->input('name'),
            'symbol' => $this->request->input('symbol')
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::destroy($id);
        $this->session->flash('message_success', trans('strings.deletedSuccess'));
        return $this->index();
    }

    public function search() {

        $units = $this->unit->where('name', 'LIKE', '%' . $this->request->input('search') . '%')->get();
        if($units->isEmpty()) {
            $this->session->flash('message_info', trans('strings.noItemsFound'));
        }
        return $this->index($units);
    }
}

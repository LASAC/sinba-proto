<?php

namespace App\Http\Controllers;

use App\Watershed;
use App\WatershedAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WatershedController extends Controller
{
    protected $request;
    protected $watershed;
    protected $session;

    public function __construct(Request $request, Watershed $watershed)
    {
        $this->request = $request;
        $this->watershed = $watershed;
        $this->session = session();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($watersheds = [], $resultLabel = null)
    {
        if(!$resultLabel) {
            $resultLabel = trans('strings.lastAccess');
        }
        // por enquanto a página inicial do sistema
        // é a listagem de bacias também.

        return view('home', [
            'resultLabel' => $resultLabel,
            'watersheds' => $watersheds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::debug('TO-TEST: WatershedController@create');
        return view('watersheds.edit', [
            'watershed' => new Watershed,
            'url' => 'watersheds',
            'method' => 'post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Log::debug('TO-TEST: WatershedController@store');
        $this->validateRequest();

        if($this->request->file('image')) {
            $image = Storage::disk('public')->putFile('images', $this->request->file('image'));
            Log::debug('WatershedController::store - image path:' . $image);
            $this->deletePreviousImage();
        }
        else {
            $image = $this->watershed->image;
        }

        Log::debug('WatershedController::store - image path:' . $image);

        $this->watershed->create([
            'name' => $this->request->input('name'),
            'description' => $this->request->input('description'),
            'image' => $image,
            'parent_id' => $this->request->input('parent_id') != 0 ? $this->request->input('parent_id') : null
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
        Log::debug('TO-TEST: WatershedController@show');

        // garante que a bacia está cadastrada
        $watershed = Watershed::findOrFail($id);

        $parent = $watershed->find($watershed->parent_id);

        // registrar último acesso:
        WatershedAccess::create([
            'user_id' => Auth::id(),
            'watershed_id' => $id
        ]);

        return view('watersheds.show', [
            'watershed' => $watershed,
            'parent' => $parent
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
        Log::debug('TO-TEST: WatershedController@edit');
        $watershed = Watershed::findOrFail($id);

        // registrar último acesso:
        WatershedAccess::create([
            'user_id' => Auth::id(),
            'watershed_id' => $id
        ]);

        Log::debug('TO-TEST: WatershedController@edit - will return...');
        return view('watersheds.edit', [
            'watershed' => $watershed,
            'method' => 'patch',
            'url' => 'watersheds/' . $watershed->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Log::debug('TO-TEST: WatershedController@update');
        $this->validateRequest(true);
        $this->watershed = $this->watershed->findOrFail($id);

        if($this->request->file('image')) {
            $image = Storage::disk('public')->putFile('images', $this->request->file('image'));
            Log::debug('WatershedController::store - image path:' . $image);
            $this->deletePreviousImage();
        }
        else {
            $image = $this->watershed->image;
        }

        // registrar último acesso:
        WatershedAccess::create([
            'user_id' => Auth::id(),
            'watershed_id' => $id
        ]);

        $updated = $this->watershed->update([
            'name' => $this->request->input('name'),
            'description' => $this->request->input('description'),
            'image' => $image,
            'parent_id' => $this->request->input('parent_id') != 0 ? $this->request->input('parent_id') : null
        ]);

        if($updated) {
            $this->session->flash('message_success', trans('strings.updatedSuccess'));
        }
        else {
            $this->session->flash('message_danger', trans('strings.updatedSuccess'));
        }

        return $this->show($id);
    }

    private function deletePreviousImage() {
        if (Storage::disk('public')->exists($this->watershed->image)) {
            $ret = Storage::disk('public')->delete($this->watershed->image);
            Log::debug('WatershedController::store - deleting previous image:' . $this->watershed->image . ' - deletion status:' . $ret);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watershed = $this->watershed->find($id);
        Log::debug('TO-TEST: WatershedController@destroy');
        Log::warning(trans('strings.deleteLogMessage') . "WATERSHED: {$watershed->name}($id) - USER: " . Auth::user()->name . "(" . Auth::id() . ")");
        $this->session->flash('message_danger', trans('strings.deleteForbiddenMessage'));
        return $this->index();
    }

    public function search()
    {
        Log::debug('TO-TEST: WatershedController@search('.$this->request->input('search').')');
        $watersheds = $this->watershed
            ->where('name', 'ILIKE', '%' . $this->request->input('search') . '%')
            ->orderBy('name')
            ->get();
        if($watersheds->isEmpty()) {
            $this->session->flash('message_info', trans('strings.noItemsFound'));
        }

        $this->session->flash('search', '');
        if(mb_strlen($this->request->input('search')) > 0) {
            $this->session->flash('search', $this->request->input('search'));
        }

        return $this->index($watersheds, trans('strings.searchResults'));
    }

    protected function validateRequest($isUpdate = false)
    {
        Log::debug('TO-TEST: WatershedController@validateRequest - start');
        $id = $isUpdate ? ", " . $this->request->input('id') : '';
        $this->validate($this->request, [
            'name' => 'required|max:255|unique:watersheds,name' . $id,
            'description' => 'required',
            'image' => $isUpdate ? '' : 'required'
        ]);
        Log::debug('TO-TEST: WatershedController@validateRequest - end');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserManagementController extends CRUDController
{
    public function __construct(Request $request, User $user)
    {
        parent::__construct($request);
        $this->model = $user;
    }

    protected function listView()
    {
        return 'users.list';
    }

    protected function editView()
    {
        return 'users.edit';
    }

    protected function collectionName()
    {
        return 'users';
    }

    protected function columnToSort()
    {
        return 'name';
    }

    protected function newModel()
    {
        return new User();
    }

    protected function validateRequest($isUpdate = false)
    {
        return User::validator($this->request->all(), $isUpdate);
    }

    public function store()
    {
        $this->validateRequest();
        User::create([
            'name' => $this->request->input('name'),
            'lastName' => $this->request->input('lastName'),
            'birthDate'  => $this->request->input('birthDate'),
            'cpf' => $this->request->input('cpf'),
            'rg' => $this->request->input('rg'),
            'address' => $this->request->input('address'),
            'phone' => $this->request->input('phone'),
            'cellphone' => $this->request->input('cellphone'),
            'email' => $this->request->input('email'),
            'occupation' => $this->request->input('occupation'),
            'institution' => $this->request->input('institution'),
            'justification' => $this->request->input('justification'),
            'password' => $this->request->input('password'),
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
            'lastName' => $this->request->input('lastName'),
            'birthDate'  => $this->request->input('birthDate'),
            'cpf' => $this->request->input('cpf'),
            'rg' => $this->request->input('rg'),
            'address' => $this->request->input('address'),
            'phone' => $this->request->input('phone'),
            'cellphone' => $this->request->input('cellphone'),
            'email' => $this->request->input('email'),
            'occupation' => $this->request->input('occupation'),
            'institution' => $this->request->input('institution'),
            'justification' => $this->request->input('justification'),
            'isAdmin' => $this->request->input('isAdmin') == true
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

        $users = $this->model
            ->where('name', 'LIKE', '%' . $this->request->input('search') . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->request->input('search') . '%')
            ->orWhere('institution', 'LIKE', '%' . $this->request->input('search') . '%')
            ->get();
        if($users->isEmpty()) {
            $this->session->flash('message_info', trans('strings.noItemsFound'));
        }

        $this->session->flash('search', '');
        if(mb_strlen($this->request->input('search')) > 0) {
            $this->session->flash('search', $this->request->input('search'));
        }



        return $this->index($users);
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

        if($model->isAdmin) {
            $this->session->flash('message_danger', trans('strings.impossibleToDeleteAnAdmin'));
            return $this->index();
        }

        $model->delete();
        $this->session->flash('message_success', trans('strings.deletedSuccess'));
        return $this->index();
    }
}

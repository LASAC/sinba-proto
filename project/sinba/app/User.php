<?php

namespace App;

use Validator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastName',
        'birthDate' ,
        'cpf' ,
        'rg' ,
        'address' ,
        'phone' ,
        'cellphone' ,
        'email' ,
        'occupation' ,
        'institution' ,
        'justification',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validator(array $data, $isUpdate = false)
    {
        $id = $isUpdate ? ", " . $data['id'] : '';
        $passwordConfirmed = !$isUpdate ? '|confirmed' : '';
        return Validator::make($data, [
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'birthDate' => 'required|date_format:"d/m/Y"',
            'cpf' => 'required|regex:[([0-9]){3}\.([0-9]){3}\.([0-9]){3}-([0-9]){2}]',
            'rg' => 'required|max:15',
            'address' => 'required|max:255',
            'phone' => 'required|regex:[\(\d{3}\)\s*\d{4}\-\d{4}]',
            'cellphone' => 'required|regex:[\(\d{3}\)\s*\d{5}\-\d{4}]',
            'email' => 'required|email|max:255|unique:users' . $id,
            'occupation' => 'required|max:255',
            'institution' => 'required|max:255',
            'justification' => 'required|max:511',
            'password' => 'required|min:6' . $passwordConfirmed,
        ]);
    }

    public function fullName() {
        return $this->name . ' ' . $this->lastName ;
    }

    public function pluckFullNames($noneValue = null) {
        $users = $this->orderBy('name')->get();
        $userArray = [];
        foreach($users as $user) {
            $userArray[$user->id] = $user->fullName();
        }
        if($noneValue) {
            $userArray[0] = $noneValue;
        }
        return $userArray;
    }
}

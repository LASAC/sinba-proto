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
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'birthDate' => 'required|date_format:"d/m/Y"',
            'cpf' => 'required|regex:[\d{11}]|unique:users' . $id,
            'rg' => 'required|max:15',
            'address' => 'required|max:255',
            'phone' => 'required|regex:[\d{10}]',
            'cellphone' => 'required|regex:[\d{11}]',
            'email' => 'required|email|max:255|unique:users' . $id,
            'occupation' => 'required|max:255',
            'institution' => 'required|max:255',
            'justification' => 'required|max:511',
            'password' => 'required|min:6' . $passwordConfirmed,
        ]);

        $validator->after(function ($validator) use ($data) {
            $cpfIsValid = self::isCpfValid($data['cpf']);
            if (!$cpfIsValid) {
                $validator->errors()->add('cpf', trans('auth.validations.cpf'));
            }
        });

        return $validator;
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

    /**
     * Function to validate CPF
     * Source: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40
     * @param  string $cpf to be validated
     * @return boolean      true if it's valid, false otherwise.
     */
    private static function isCpfValid($cpf) {
        // Extrai somente os numeros
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequencia de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}

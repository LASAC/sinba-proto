<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserRegistered;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return User::validator($data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // create the user...
        $newUser = User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'birthDate' => $data['birthDate'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'cellphone' => $data['cellphone'],
            'email' => $data['email'],
            'occupation' => $data['occupation'],
            'institution' => $data['institution'],
            'justification' => $data['justification'],
            'password' => bcrypt($data['password']),
        ]);

        try {
            // notify admins...
            $recipients = User::where('isAdmin', true)->get();
            Mail::bcc($recipients)->send(new UserRegistered($newUser));
        } catch (\Exception $exception) {
            Log::error($exception);
        }

        return $newUser;
    }
}

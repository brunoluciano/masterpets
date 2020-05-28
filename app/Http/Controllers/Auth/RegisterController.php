<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
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
        $message = [
            'required' => 'O campo :attribute é obrigatório!',
            'size'    => 'O campo :attribute deve ter exatamente :size caracteres.',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'sexo' => 'required',
            'endereco' => 'required',
            'numero' => ['required','min:1'],
            'complemento' => 'required',
            'cidade' => 'required',
            'estado_id' => 'required',
            'bairro' => 'required',
            'cep' => ['required','size:8'],
            'telefone' => 'required',
            'nascimento' => 'required',
            'cpf' => ['required','size:11'],
        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sexo' => $data['sexo'],
            'endereco' => $data['endereco'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'cidade' => $data['cidade'],
            'estado_id' => $data['estado_id'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep'],
            'telefone' => $data['telefone'],
            'nascimento' => $data['nascimento'],
            'cpf' => $data['cpf'],
        ]);
    }
}

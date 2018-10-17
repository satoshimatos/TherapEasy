<?php

namespace therapeasy\Http\Controllers\Auth;

use therapeasy\User;
use therapeasy\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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

    private $user;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'crp' => 'required|integer',
            'nascimento' => 'required|string|max:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \therapeasy\User
     */
    protected function createPsicologo(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'crp' => $data['crp'],
            'nascimento' => $data['nascimento'],
        ]);
    }

    protected function createCliente(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nascimento' => $data['nascimento'],
            'psicologo' => $data['psicologo'],
        ]);
    }

    protected function store(Request $request)
    {
        $dataForm = $request->all();

        if (isset($dataForm['crp'])) {
            $dataForm = $this->createPsicologo($dataForm);
        } else{
            $dataForm = $this->createCliente($dataForm);
        }

        return view('auth/register');
    }

    public function selecao()
    {
        return view('auth/register');
    }

    public function cliente()
    {
        return view('auth/register-cliente');
    }

    public function psicologo()
    {
        return view('auth/register-psicologo');
    }
}

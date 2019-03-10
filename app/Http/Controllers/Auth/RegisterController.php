<?php

namespace App\Http\Controllers\Auth;

use App\Store;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/user';

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
        $rules = [
            'name' => 'required|string|max:30',
            'first_name'=> 'required|string|max:30',
            'email' => 'required|string|email|max:50|unique:users',
            'phone'=>'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ];

        if(\Request::filled('is_resp')){
            $rules['store_name'] ='required';
            $rules['siret']='required';
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            $u = User::create([
                'name' => $data['name'],
                'firstname' => $data['first_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => bcrypt($data['password']),
                'is_resp' => isset($data['is_resp'])
            ]);

            if (isset($data['is_resp'])) {

                Store::create([
                    'name' => $data['store_name'],
                    'siret' => $data['siret'],
                    'user_id' => $u->id
                ]);

                $this->redirectTo = '/manager';

            }
            return $u;
    }
}

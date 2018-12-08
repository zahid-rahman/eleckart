<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone'=> 'required|max:11',
            'address'=>'required|string'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $username = str_slug($data['name']);
        User::create([
            'name' => $username,
            'email' => $data['email'],
            'phone_number' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role'=>$data['role']
        ]);

        
        $id = DB::table('users')->where('email',$data['email'])->pluck('id')->first();

        $customer = [
            'name' => $username,
            'id'=>$id,
            'email' => $data['email'],
            'phone_number' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'approval'=>'online',
            'role'=>$data['role']
        ];

       
        DB::table('customers')->insert($customer);
        
        return  User::find($id);
    }
}

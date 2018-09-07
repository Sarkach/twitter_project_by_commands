<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Gender;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
            'firstname' => 'required|string|max:255',
			'surname' => 'required|string|max:255',
			'patronymic' => 'required|string|max:255',
			'dob' => 'required|date',
			'gender_id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
     var_dump ($data);
	 $genders = Gender::orderBy('id', 'ASC')->get();
      /*  return User::create([
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
		   'gender_id' => $data['gender_id']
        ]);*/
    }

    public function showRegistrationForm()
    {
     $genders = gender::orderBy('title', 'ASC')->get();// выгпузка юзеров через create
     return view('auth.register')->withGenders($genders);
      // var_dump ($genders);
    }
}

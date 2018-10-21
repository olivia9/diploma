<?php

namespace App\Http\Controllers\Api_v1;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function store(UserRequest $request)
    {
        User::create([
            'email' => $request->get('email'),
            'login' =>$request->get('login'),
            'password'=>Crypt::encrypt($request->get('password'))
        ]);
    }

    public function index(UserRequest $request)
    {
        $users = User::all();

        dd($users);
    }
    public function update(UserRequest $request,User $user)
    {
        $user->firstname = $request->has('firstname')?$request->get('firstname'):$user->firstname;
        $user->lastname = $request->has('lastname')?$request->get('lastname'):$user->lastname;
        $user->password = $request->has('password')?Crypt::encrypt($request->get('password')):$user->password;

        if($request->has('password')&& !$user->changed_password)
            $user->changed_password = 1;
        $user->save();
    }

    public function destroy(UserRequest $request,User $user)
    {
        $user->delete();
    }

}

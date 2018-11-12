<?php

namespace App\Http\Controllers;

use App\Http\Requests\User as UserRequest;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRequest $request)
    {
        $users = User::whereNotNull('email_verified_at')->get();
        $roles = Role::all();

        return view('users',['users'=>$users,
            'roles' => $roles]);
    }

    public function newUserForm()
    {
        $roles = Role::all();

        return view('new_user', ['roles' => $roles]);
    }

    public function newUser(Request $request)
    {
      /*  $email = $request->get('email');
        $role = $request->get('role');

        $user = User::create(['email' => $email, 'password' => '']);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => (int)$role
        ]);*/
        Mail::send('emails.new_user',[], function ($message) {
            $message->from('us@example.com', 'Laravel');

            $message->to('foo@example.com');
        });
    }

    public function showFinishRegistrationForm($email)
    {
        $userInfo = User::where('email', $email)->first();

        return view('finish_registration', ['userInfo' => $userInfo]);
    }
}

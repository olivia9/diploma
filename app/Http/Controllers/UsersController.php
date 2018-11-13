<?php

namespace App\Http\Controllers;

use App\Http\Requests\User as UserRequest;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
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
     * @var UserRequest $request
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
        $email = $request->get('email');
        $role = $request->get('role');

        $user = User::create(['email' => $email, 'password' => '']);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => (int)$role
        ]);
    }

    public function showFinishRegistrationForm($email)
    {
        $userInfo = User::where('email', $email)->first();

        return view('finish_registration', ['userInfo' => $userInfo]);
    }

    public function finishRegistration(Request $request, $email)
    {
        User::where('email', $email)
            ->update(['firstname' => $request->get('firstname'),
                      'lastname' => $request->get('lastname'),
                      'password' => $request->get('password'),
                      'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s')
                ]);
    }
}

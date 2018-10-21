<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project as ProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function index()
    {
        $users = User::all();
        return view('users',['users'=>$users]);
    }

    public function newUserForm()
    {
        return view('new_user');
    }

    public function newUser(Request $request)
    {
        dd($request->get('email'));
      /*  $project = new Project;
        $project->avatar = 'test';
        $project->name = $request->get('name');
        $project->pm_id = 1;

        $project->save();*/
    }
}

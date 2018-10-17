<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project as ProjectRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
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
        $projects = [
            [
              'name' => 'proj1'
            ],
            [
               'name' => 'proj2'
            ]
        ];
        return view('projects',['projects'=>$projects]);
    }

    public function newProjectForm()
    {
        $pmS = User::all()->pluck('name','id');

        return view('new_project',['pmS'=>$pmS]);
    }

    public function newProject(ProjectRequest $request)
    {
        dd($request->get('name'));
        dd($request->get('pm'));
        $pmS = User::all()->pluck('name','id');

        return view('new_project',['pmS'=>$pmS]);
    }
}

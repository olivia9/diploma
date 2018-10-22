<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project as ProjectRequest;
use App\Models\IssueStatus;
use App\Models\IssueType;
use App\Models\Project;
use App\Models\User;
use App\Models\Issue;
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
        $projects = Project::with('pm')->get();

        return view('projects',['projects'=>$projects]);
    }

    public function board($id)
    {
        $project = Project::find($id);
        $issueStatuses = IssueStatus::all();
        $issues = Issue::all();
        $issueTypes = IssueType::all();

        return view('project_board',[
            'project'=>$project,
            'issueStatuses' => $issueStatuses,
            'issues'=>$issues,
            'issueTypes' => $issueTypes
        ]);
    }

    public function newProjectForm()
    {
        $pmS = User::all()->pluck('name','id');

        return view('new_project',['pmS'=>$pmS]);
    }

    public function newProject(ProjectRequest $request)
    {
        $project = new Project;
        $project->avatar =$request->get('avatar','task.jpg');
        $project->name = $request->get('name');
        $project->pm_id = 1;

        $project->save();
    }

    public function settings($id)
    {
        $project = Project::find($id);
        $pmS = User::all()->pluck('name','id');
        return view('project_settings',['project'=>$project, 'pmS'=>$pmS]);
        //dd($project->pm);
       // dd($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project as ProjectRequest;
use App\Models\IssueStatus;
use App\Models\IssueType;
use App\Models\Project;
use App\Models\User;
use App\Models\Issue;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);
        $projects = Project::with('pm')->get();

        return view('analytics',['project'=>$project]);
    }

    public function board($id)
    {
        $project = Project::find($id);
        $issueStatuses = IssueStatus::all();
        $issues = Issue::all();
        $issueTypes = IssueType::all();
        $executors = User::staff()->get();

        return view('project_board',[
            'project'=>$project,
            'issueStatuses' => $issueStatuses,
            'issues'=>$issues,
            'issueTypes' => $issueTypes,
            'executors' => $executors
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
    }
}

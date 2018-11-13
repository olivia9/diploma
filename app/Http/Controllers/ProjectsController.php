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
use App\Models\UserRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
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
    public function index()
    {
        $pmS =  User::pmS();

        $loginUser = Auth::user();

        if($loginUser->admin)
            $projects = Project::with('pm')->get();

        if($loginUser->pm)
            $projects = Project::with('pm')->where('pm_id', $loginUser->id)->get();

        if($loginUser->staff)
            $projects = Project::with('pm')->where('pm_id', $loginUser->id)->get();

        return view('projects',['projects'=>$projects, 'pmS'=>$pmS]);
    }

    public function delete($projectId)
    {
        $project = Project::find($projectId);
        $project->delete();

        return response('', 204);
    }


    public function board($id)
    {
        $project = Project::find($id);
        $issueStatuses = IssueStatus::all();
        $issues = Issue::where('project_id', $id)->get();
        $issueTypes = IssueType::all();
        $executors = User::whereIn('id', UserRole::where('role_id', Role::where('slug', 'staff')->first()->id)->get()->pluck('user_id'))->get();
        
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
        $pmS =  User::pmS();
        return view('new_project',['pmS'=>$pmS]);
    }

    public function newProject(ProjectRequest $request)
    {
        $project = new Project;
        $project->avatar =$request->get('avatar','task.jpg');
        $project->name = $request->get('name');
        $project->key = $request->get('key');
        $project->pm_id = $request->get('pm');

        $project->save();
    }

    public function settings($id)
    {
        $project = Project::find($id);
        $pmS = User::all()->pluck('name','id');
        return view('project_settings',['project'=>$project, 'pmS'=>$pmS]);
    }
}

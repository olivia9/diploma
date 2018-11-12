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

class UserPermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function permissions($role)
    {
       $permissions = RolePermission::with(Permission::class)->get();//Permission::w
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role =Auth::user()->role;
        $permissionIds = RolePermission::where('role_id', $role->id)->pluck('id');
        $permissions = Permission::whereIn('id', $permissionIds)->get()
                        ->map(function($collection){
                            return $collection->name.'.'.$collection->permission;
                        });

       return $permissions;
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

    //public function
}

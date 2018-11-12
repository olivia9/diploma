<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\User;
use App\Http\Requests\Issue as IssueRequest;
use App\Http\Controllers\Controller;

class IssuesController extends Controller
{

    public function index()
    {
        return view('create_issueU');
    }

    public function show(IssueRequest $request, $issueId)
    {
        $issue = Issue::find($issueId);
        return response($issue, 200);
    }

    public function store(IssueRequest $request)
    {

        $issue = new Issue();
        $issue->name = $request->get('name');
        $issue->executor_id = $request->get('executor');
        $issue->project_id = $request->get('project');
        $issue->status_id = $request->get('status');
        $issue->issue_type_id = $request->get('type');
        $issue->complexity = $request->get('complexity');
        $issue->estimated_time = $request->get('estimated_time');
        $issue->priority = $request->get('priority');

        $issue->save();
        //$issue->
    }
}

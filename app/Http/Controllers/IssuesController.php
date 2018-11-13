<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssueStatus;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\Issue as IssueRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IssuesController extends Controller
{

    public function index()
    {
        return view('create_issueU');
    }

    public function show(IssueRequest $request, $issueId)
    {
        $issue = Issue::with(['executor','status', 'type'])->where('id', $issueId)->first();//find($issueId);

        return response($issue, 200);
    }

    public function delete(IssueRequest $request, $issueId)
    {
        $issue = Issue::find($issueId);
        $issue->delete();

        return response('', 204);
    }

    public function approve(IssueRequest $request, $issueId)
    {
        $issue = Issue::find($issueId);
        $issue->approved_by_pm = 1;

        $issue->update();
    }

    public function returnIssue(IssueRequest $request, $issueId)
    {
        $issue = Issue::find($issueId);
        $issue->return++;
        $issue->status_id = IssueStatus::where('name', 'to_do')->first()->id;

        $issue->update();
    }

    public function rate(IssueRequest $request, $issueId)
    {
        $issue = Issue::find($issueId);
        $issue->rate_by_pm = $request->get('rate');
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
        $issue->spent_time = $request->get('estimated_time');
        $issue->priority = $request->get('priority');

        $issue->save();
    }

    public function update(IssueRequest $request, $id)
    {
        $issue = Issue::find($id);
        $issue->id = $id;
        $issue->name = $request->get('name');
        $issue->executor_id = $request->get('executor');
        $issue->project_id = $request->get('project');
        $issue->status_id = $request->get('status');
        $issue->issue_type_id = $request->get('type');
        $issue->complexity = $request->get('complexity');
        $issue->estimated_time = $request->get('estimated_time');
        $issue->priority = $request->get('priority');

        $issue->update();
    }

    public function listToBeApprove(IssueRequest $request)
    {
        $listIssues = Issue::where('approved_by_pm',0)->where('status_id', IssueStatus::where('name', 'done')->first()->id)->where('project_id', Project::where('pm_id', Auth::user()->id)->get()->pluck('id'))->get();

        return view('list_to_be_approved', ['issues' => $listIssues]);
    }
}

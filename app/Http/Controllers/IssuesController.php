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
        return view('create_issue');
    }

    public function store(IssueRequest $request)
    {
        $issue = new Issue();
        $issue->name = $request->get('name');
        $issue->
    }
}

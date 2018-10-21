<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class IssuesController extends Controller
{

    public function index()
    {
        return view('create_issue');
    }
}

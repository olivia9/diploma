@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div >
                            <img style="width:40px;" src="{{ URL::to('/images/'.$project->avatar) }}"  />
                            <span style="font-size:25;">{{$project->name}}</span>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div style="padding:10px;"><a href="{{ url("/project/{$project->id}/sprints") }}">Sprints</a></div>
                        <div style="padding:10px;background:#F0FFF0;"><a href="{{ url("/project/{$project->id}/board") }}">Board</a></div>
                        <div style="padding:10px;"><a href="{{ url("/project/{$project->id}/settings") }}">Settings</a></div>
                        <div style="padding:10px;"><a href="{{ url("/project/{$project->id}/analytics") }}">Analytics</a></div>
                        <div> </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 p">
                   <div style="font-size:20pt;">{{$project->name}} board</div>
               <!--    <div><a href=""><img style="width:40px;" src="{{ URL::to('/images/add_user.png') }}"  /></a></div>-->
                <?php

                foreach($issueStatuses as $issueStatus)
                    {
                        echo '<div class="panel-body panel panel-default" style="width:250px;display:inline-block;margin-left:20px;">
                        <p style="padding:3px;">'.$issueStatus->name.'</p>';
                        foreach($issues as $issue)
                            if($issue->status_id==$issueStatus->id)
                                {
                                    echo '<div class="panel panel-default">
                                        <div class="panel-heading">
                                            $project->key.$issue->id}}
                                        </div>
                                        <div class="panel-body">'.$issue->name.'</div>
                                        </div>';
                                }
                        echo '<div style="alignment: center;" class="create_issue">+<a href= "'.url("/issues/create").'"><button>+</button></a></div>
                        </div>';

               }
                ?>

             </div>
    </div>
@endsection

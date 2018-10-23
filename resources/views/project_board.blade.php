@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div >
                            <img style="width:40px;" src="{{ URL::to('/images/'.$project->avatar) }}"  />
                            <span class='project_name' style="font-size:25;">{{$project->name}}</span>
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

            <div class="col-md-9">
                   <div style="font-size:20pt;">{{$project->name}} board</div>
               <!--    <div><a href=""><img style="width:40px;" src="{{ URL::to('/images/add_user.png') }}"  /></a></div>-->
                <?php

                foreach($issueStatuses as $issueStatus)
                    {
                        echo '<div class="panel-body panel panel-default issue_status_panel" style="width:250px;display:inline-block;margin-left:20px;">
                        <p style="padding:3px;" class="issue_status_name" issue_status_id='.$issueStatus->id.'>'.$issueStatus->name.'</p>';
                        foreach($issues as $issue)
                            if($issue->status_id==$issueStatus->id)
                                {
                                    echo '<div class="panel panel-default">
                                        <div class="panel-heading">'.
                                            $project->key.$issue->id.'
                                        </div>
                                        <div class="panel-body">'.$issue->name.'</div>
                                        </div>';
                                }
                                echo '<button type="button" class="btn btn-info btn-lg issue_create" data-toggle="modal" data-target="#issueCreate">+</button></div>';
               }
                ?>

             </div>
    </div>

        <div id="issueCreate" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Issue</h4>
                    </div>
                    <div class="modal-body">
                        <label for="project" class="col-md-4 control-label">Project</label>
                        <input id="project" type="text" class="form-control" disabled name="project" value="{{ old('name') }}" required autofocus>

                        <label for="name" class="col-md-4 control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        <label for="executor" class="col-md-4 control-label">Executor</label>
                        <select id="executor" class="form-control">

                        </select>

                        <label for="status" class="col-md-4 control-label">Status</label>
                        <input id="status" type="text" class="form-control" disabled name="status" value="{{ old('name') }}" required autofocus>

                        <label for="issue_type" class="col-md-4 control-label">Issue Type</label>
                        <select id="issue_type" class="form-control">
                            <?php
                                foreach($issueTypes as $issueType)
                                    {
                                        echo '<option issue_type_id="'.$issueType->id.'">'.$issueType->name.'</option>';
                                    }
                            ?>
                        </select>

                        <label for="complexity" class="col-md-4 control-label">Complexity</label>
                        <select id="complexity" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        <label for="execution" class="col-md-4 control-label">Execution time(minute)</label>
                        <input id="execution" type="text" class="form-control"  name="status" value="{{ old('name') }}"

                        <label for="priority" class="col-md-4 control-label">Priority</label>
                        <select id="priority" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">New Issue</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
@endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $(document).on("click", ".issue_create", function () {
        var issueStatus = {'name': $(this).closest('.issue_status_panel').find('.issue_status_name').html(),
           'id':$(this).closest('.issue_status_panel').find('.issue_status_name').attr('issue_status_id')};

        $('#issueCreate #status').val(issueStatus['name']);
        $('#issueCreate #status').attr('status_id', issueStatus['id']);
        $('#project').val($('.project_name').html());

    });
</script>
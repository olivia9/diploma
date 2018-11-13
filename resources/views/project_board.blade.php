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

                        <!--<div style="padding:10px;"><a href="{{ url("/project/{$project->id}/sprints") }}">Sprints</a></div>-->
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
                        echo '<div class="panel-body panel panel-default issue_status_panel" style="float: left; width:250px;display:inline-block;margin-left:20px;">
                        <p style="padding:3px;" class="issue_status_name" issue_status_id='.$issueStatus->id.'>'.$issueStatus->name.'</p>';
                        foreach($issues as $issue)
                            if($issue->status_id==$issueStatus->id)
                                {
                                    echo '<div class="panel panel-default issue_update" issue_id="'.$issue->id.'">
                                        <div class="panel-heading">'.
                                            $project->key.$issue->id.' <span style="background:#8eb4cb; padding:2px;">'.$issue->executor->name.'</span>
                                        <button type="button" class="close delete_issue" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="panel-body"  data-toggle="modal" data-target="#issueUpdate">'.$issue->name.'</div>
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
                    <div id="crf_token">{{csrf_field()}}</div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Issue</h4>
                    </div>
                    <div class="modal-body">
                        <label for="project" class="col-md-4 control-label">Project</label>
                        <input id="project" type="text" class="form-control" project_id="{{$project->id}}" disabled name="project" value="{{ old('name') }}" required autofocus>

                        <label for="name" class="col-md-4 control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        <label for="executor" class="col-md-4 control-label">Executor</label>
                        <select id="executor" class="form-control">
                            <?php
                            foreach($executors as $executor)
                            {
                                echo '<option executor_id="'.$executor->id.'">'.$executor->name.'</option>';
                            }
                            ?>
                        </select>

                        <label for="status" class="col-md-4 control-label">Status</label>
                        <input id="status"  type="text" class="form-control" disabled name="status" value="{{ old('name') }}" required autofocus>

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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <label for="estimated_time" class="col-md-4 control-label">Estimated time(hour)</label>
                        <input id="estimated_time" type="number" class="form-control"  name="status" value="0">

                        <label for="priority" class="col-md-4 control-label">Priority</label>
                        <select id="priority" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-submit new_issue" data-dismiss="modal">New Issue</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--ISSUE UPDATE-->
        <div id="issueUpdate" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div id="crf_token">{{csrf_field()}}</div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">UPDATE Issue</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="issue" value=""/>
                        <label for="project" class="col-md-4 control-label">Project</label>
                        <input id="project" type="text" class="form-control" project_id="{{$project->id}}" disabled name="project" value="{{ old('name') }}" required autofocus>

                        <label for="name" class="col-md-4 control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        <label for="executor" class="col-md-4 control-label">Executor</label>
                        <select id="executor" class="form-control">
                            <?php
                            foreach($executors as $executor)
                            {
                                echo '<option executor_id="'.$executor->id.'">'.$executor->name.'</option>';
                            }
                            ?>
                        </select>

                        <label for="status" class="col-md-4 control-label">Status</label>
                       <!-- <input id="status"  type="text" class="form-control" disabled name="status" value="{{ old('name') }}" required autofocus>
-->
                        <select id="status" class="form-control">
                            <?php
                            foreach($issueStatuses as $status)
                            {
                                echo '<option status_id="'.$status->id.'">'.$status->name.'</option>';
                            }
                            ?>
                        </select>

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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <label for="estimated_time" class="col-md-4 control-label">Estimated time(hour)</label>
                        <input id="estimated_time" type="number" class="form-control"  name="status" value="{{ old('name') }}">

                        <label for="priority" class="col-md-4 control-label">Priority</label>
                        <select id="priority" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-submit update_issue" data-dismiss="modal">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Open modal window for creating new issue
        $(document).on("click", ".issue_create", function () {
            var issueStatus = {'name': $(this).closest('.issue_status_panel').find('.issue_status_name').html(),
                'id':$(this).closest('.issue_status_panel').find('.issue_status_name').attr('issue_status_id')};
            if(issueStatus['name'] == 'done')
                $('#issueCreate .modal-body').append('<label for="spent_time" class="col-md-4 control-label">Spent time(hour)</label>\n' +
                    '                        <input id="spent_time" type="number" class="form-control"  name="status">');
            //console.log(issueStatus);

            $('#issueCreate #status').val(issueStatus['name']);
            $('#issueCreate #status').attr('status_id', issueStatus['id']);
            $('#project').val($('.project_name').html());

        });

        //Creating new issue
        $(document).on("click", ".new_issue", function () {

            var issue = {
                'name' : $('#issueCreate #name').val(),
                'project': $("#issueCreate #project").attr('project_id'),
                'executor' : $('#issueCreate #executor option:selected').attr('executor_id'),
                'status' :  $('#issueCreate #status').attr('status_id'),
                'type' : $( '#issueCreate #issue_type option:selected').attr('issue_type_id'),
                'complexity' : $('#issueCreate #complexity option:selected').val(),
                'estimated_time' : $('#issueCreate #estimated_time').val(),
                'spent_time' : ( typeof $('#issueCreate #spent_time').val() != 'undifined')? $('#issueCreate #spent_time').val() :0,
                'priority' : $('#issueCreate #priority option:selected').val()
            };

            $.ajax({
                type: "POST",
                url: '/issues/new',
                data: issue,
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (data) {
                    document.location.reload();
                }
            });

        });

        //Updating issue
        $(document).on("click", ".issue_update .panel-body", function () {
            var issueId = $(this).closest('.issue_update').attr('issue_id');
            $.ajax({
                type: "GET",
                url: '/issues/'+issueId,
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (issueData) {
                    $('#issueUpdate #name').val(issueData['name']);
                    $('#issueUpdate #project').val($('.project_name').html());
                    $('#issueUpdate #status').attr('status_id', issueData['status_id']);
                    $('#issueUpdate #estimated_time').val(issueData['estimated_time']);
                    $('#issueUpdate #priority').val(issueData['priority']);
                    $('#issueUpdate #complexity').val(issueData['complexity']);
                    $('#issueUpdate input[name="issue"]').val(issueData['id']);
                }
            });
        });

        //Creating new issue
        $(document).on("click", ".update_issue", function () {

            var issue = {
                'name' : $('#issueUpdate #name').val(),
                'project': $("#issueUpdate #project").attr('project_id'),
                'executor' : $('#issueUpdate #executor option:selected').attr('executor_id'),
                'status' :  $('#issueUpdate #status').attr('status_id'),
                'type' : $( '#issueUpdate #issue_type option:selected').attr('issue_type_id'),
                'complexity' : $('#issueUpdate #complexity option:selected').val(),
                'estimated_time' : $('#issueUpdate #estimated_time').val(),
                'priority' : $('#issueUpdate #priority option:selected').val()
            };

            $.ajax({
                type: "POST",
                url: '/issues/' + $('#issueUpdate input[name="issue"]').val(),
                data: issue,
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (data) {
                    document.location.reload();
                }
            });

        });

        //Change status issue
        $(document).on('change', '#issueUpdate #status', function(){
            if($('#issueUpdate #status option:selected').val() =='done'){
                $('#issueUpdate .modal-body').append('<label for="spent_time" class="col-md-4 control-label">Spent time(hour)</label>\n' +
                    '                        <input id="spent_time" type="number" class="form-control"  name="status">');
            }
        })

        //Delete Issue
        $(document).on("click", ".delete_issue", function () {
            var issueId = $(this).closest('.issue_update').attr('issue_id');
            $.ajax({
                type: "DELETE",
                url: '/issues/' + issueId,
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (data) {
                    document.location.reload();
                }
            });
        });

    </script>
        <!--ISSUE UPDATE-->
@endsection

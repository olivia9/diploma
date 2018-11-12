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
                       <!-- <div style="padding:10px;"><a href="{{ url("/project/{$project->id}/sprints") }}">Sprints</a></div>-->
                        <div style="padding:10px;"><a href="{{ url("/project/{$project->id}/board") }}">Board</a></div>
                        <div style="padding:10px;"><a href="{{ url("/project/{$project->id}/settings") }}">Settings</a></div>
                        <div style="background:#F0FFF0;padding:10px;"><a href="{{ url("/project/{$project->id}/analytics") }}">Analytics</a></div>
                        <div> </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                   <div style="font-size:20pt;">{{$project->name}} analytics</div>
                <div class="panel-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">koef</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Natalia
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mike
                                </td>
                                <td>
                                    2.7
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Anton
                                </td>
                                <td>
                                    2.5
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
               <!--    <div><a href=""><img style="width:40px;" src="{{ URL::to('/images/add_user.png') }}"  /></a></div>-->

             </div>
    </div>

@endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    //Open modal window for creating new issue
    $(document).on("click", ".issue_create", function () {
        var issueStatus = {'name': $(this).closest('.issue_status_panel').find('.issue_status_name').html(),
           'id':$(this).closest('.issue_status_panel').find('.issue_status_name').attr('issue_status_id')};

        $('#issueCreate #status').val(issueStatus['name']);
        $('#issueCreate #status').attr('status_id', issueStatus['id']);
        $('#project').val($('.project_name').html());

    });

    //Creating new issue
    $(document).on("click", ".new_issue", function () {

        var issue = {
            'name' : $('#name').val(),
            'project': $("#project").attr('project_id'),
            'executor' : $('#executor option:selected').attr('executor_id'),
            'status' :  $('#issueCreate #status').attr('status_id'),
            'type' : $( '#issue_type option:selected').attr('issue_type_id'),
            'complexity' : $('#complexity option:selected').val(),
            'estimated_time' : $('#estimated_time').val(),
            'priority' : $('#priority option:selected').val()
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
                console.info(data);
            }
        });

    });


</script>
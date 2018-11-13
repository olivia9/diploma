@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-offset-2 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display:inline-block;">List Issues with status 'Done'</div>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Key</th>
                                <th scope="col">Text</th>
                                <th scope="col">Executor</th>
                                <th></th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($issues as $issue){
                                    echo '<tr project_name="'.$issue->project->name.'" issue_id="'.$issue->id.'"><td>
                                        '.$issue->project->key.$issue->id.'
                                            </td>
                                          <td>'.
                                        $issue->name.'
                                            </td>
                                            <td>'.
                                       $issue->executor->name.'
                                            </td>
                                            <td>
                                            <a class="show_issue_info" data-toggle="modal" data-target="#issueInfo" style="cursor:pointer">Open</a>
                                            </td></tr>';
                                }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal_windows/issue/info')
    <script>
        $(document).on('click', '.show_issue_info', function(){
            var issueId = $(this).closest('tr').attr('issue_id');
            var projectName = $(this).closest('tr').attr('project_name');
            $.ajax({
                type: "get",
                url: '/issues/' + issueId,
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (issueInfo) {
                    console.log(issueInfo);
                    //alert(issueInfo['executor']['firstname']);
                    $("#issueInfo").attr('issue_id', issueInfo['id']);
                    $("#issueInfo #project").val(projectName);
                    $("#issueInfo #name").val(issueInfo['name']);
                    $("#issueInfo #executor").val(issueInfo['executor']['firstname']);
                    $("#issueInfo #status").val(issueInfo['status']['name']);
                    $("#issueInfo #issue_type").val(issueInfo['type']['name']);
                    $("#issueInfo #complexity").val(issueInfo['complexity']);
                    $("#issueInfo #priority").val(issueInfo['priority']);
                    $("#issueInfo #estimated_time").val(issueInfo['estimated_time']);
                    $("#issueInfo #spent_time").val(issueInfo['spent_time']);
                }
            });
        });

        $(document).on('click', '#issueInfo .approve', function(){
            var issueId = $('#issueInfo').attr('issue_id');

            $.ajax({
                type: "POST",
                url: '/issues/' + issueId+'/approve',
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (issueInfo) {

                }
            });
        })

        $(document).on('click', '#issueInfo .return', function(){
            var issueId = $('#issueInfo').attr('issue_id');
            $.ajax({
                type: "POST",
                url: '/issues/' + issueId+'/return',
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (issueInfo) {

                }
            });
        })

        $(document).on('click', '#issueInfo .rate', function(){
            var issueId = $('#issueInfo').attr('issue_id');//$(this).closest('tr').attr('issue_id');

            $.ajax({
                type: "POST",
                url: '/issues/' + issueId+'/rate',
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                dataType: 'json',
                success: function (issueInfo) {

                }
            });
        })
    </script>
@endsection
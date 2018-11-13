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
                                    echo '<td>
                                        '.$issue->project->key.$issue->id.'
                                            </td>
                                          <td>'.
                                        $issue->name.'
                                            </td>
                                            <td>'.
                                       $issue->executor->name.'
                                            </td>
                                            <td>
                                            <a data-toggle="modal" data-target="#issueInfo" style="cursor:pointer">Open</a>
                                            </td>';
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
@endsection
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


@extends('layouts.app')

@section('content')

    @include('modal_windows/project/new')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display:inline-block;">List Projects</div>
                        <div style="display:inline-block;float:right;"><button>
                            <a data-toggle="modal" data-target="#newProject">
                                New Project
                            </a>
                        </button>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Key</th>
                                <th scope="col">PM</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr project_id="{{$project->id}}">
                                    <td>
                                        <img style="width:30px;" src="{{ URL::to('/images/'.$project->avatar) }}"  />
                                        <a href="/project/{{$project['id']}}/board">
                                            {{$project['name']}}
                                        </a>
                                    </td>
                                    <td>{{$project['key']}}
                                    <td> <img style="width:30px;" src="{{ URL::to('/images/user.png') }}"  />{{$project['pm']['name']}}
                                    </td>
                                    <td><button type="button" class="close delete_project" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Delete Issue
        $(document).on("click", ".delete_project", function () {
            var projectId = $(this).closest('tr').attr('project_id');

            $.ajax({
                type: "DELETE",
                url: '/projects/' + projectId,
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
@endsection

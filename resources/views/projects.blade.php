@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-offset-2 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display:inline-block;">List Projects</div>
                        <div style="display:inline-block;float:right;"><button>
                            <a href="{{ url('/projects/new/form') }}">
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
                                <tr>
                                    <td>
                                        <img style="width:30px;" src="{{ URL::to('/images/'.$project->avatar) }}"  />
                                        <a href="/project/{{$project['id']}}/board">
                                            {{$project['name']}}
                                        </a>
                                    </td>
                                    <td>{{$project['key']}}
                                    <td> <img style="width:30px;" src="{{ URL::to('/images/user.png') }}"  />{{$project['pm']['name']}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
    </div>
    </div>
@endsection

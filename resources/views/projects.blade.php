@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="left">List Projects</div>
                        <a href="{{ url('/projects/new/form') }}">
                           New Project
                        </a>
                    </div>

                    <div class="panel-body">
                       @foreach($projects as $project)
                        <p>{{$project['name']}}</p>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

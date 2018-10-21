@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="left">List Users</div>
                        <a href="{{ url('/users/new/form') }}">
                            New User
                        </a>
                    </div>

                    <div class="panel-body">
                        @foreach($users as $users)
                            <p>{{$users['name']}}</p>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

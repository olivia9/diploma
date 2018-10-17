@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/projects/new') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-4 control-label">Avatar</label>
                                <input name="avatar" id="avatar" type="file" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="pm" class="col-md-4 control-label">Project Manager</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="pm" name="pm" >
                                        @foreach($pmS as $id=>$name)
                                            <option id="{{$id}}">{{$name}}</option>>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        New Project
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

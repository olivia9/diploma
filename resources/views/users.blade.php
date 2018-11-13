@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display:inline-block;">List Users</div>
                        <div style="display:inline-block;float:right;"><button>
                                <a href="" data-toggle="modal" data-target="#userCreate">
                                    New User
                                </a>
                            </button>
                        </div>
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

    <div id="userCreate" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="crf_token">{{csrf_field()}}</div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New User</h4>
                </div>
                <div class="modal-body">
                    <label for="email" class="col-md-4 control-label">Email</label>

                        <input id="email" type="text" class="form-control" name="email" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <label for="pm" class="col-md-4 control-label">Role</label>

                            <select class="form-control"  id="role" name="role" >
                                @foreach($roles as $role)
                                    <option role_id="{{$role->id}}">{{$role->name}}</option>>

                                @endforeach

                            </select>
                    </div>

                <div class="modal-footer">
                    <button  class="btn btn-primary new_user">
                        New User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", ".new_user", function () {

            $.ajax({
                type: "POST",
                url: '/users/new',
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                data:{
                    'email':$('#email').val(),
                    'role':$('#role option:selected').attr('role_id')
                },
                dataType: 'json',
                success: function () {
                    document.location.reload();
                }
            });

        });
    </script>

@endsection

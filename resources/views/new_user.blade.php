@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" >
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pm" class="col-md-4 control-label">Role</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="role" name="role" >
                                        @foreach($roles as $role)
                                            <option role_id="{{$role->id}}">{{$role->name}}</option>>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button  class="btn btn-primary" id="new_user">
                                        New User
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

<script>
    $(document).on("click", "#new_user", function () {
       // alert($('#role option:selected').attr('role_id'));
        var issueId = $(this).attr('issue_id');
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
            success: function (issueData) {
                $('#issueUpdate #name').val(issueData['name']);
                $('#issueUpdate #project').val($('.project_name').html());
                $('#issueUpdate #status').attr('status_id');
            }
        });
    });
</script>

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
                                    <input id="email" disabled type="text" class="form-control" name="email" value="{{ $userInfo->email }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reset_password" class="col-md-4 control-label">Reset Password</label>
                                <div class="col-md-6">
                                    <input id="reset_password" type="password" class="form-control" name="reset_password"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button  class="btn btn-primary" id="finish_registration">
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
    $(document).on("click", "#finish_registration", function () {
        var email = $('#email').val();
        var issueId = $(this).attr('issue_id');
        $.ajax({
            type: "POST",
            url: '/users/'+email+'/finish_registration',
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
            },
            data:{
                'firstname' : $('#firstname').val(),
                'lastname' : $('#lastname').val(),
                'password' : $('#password').val()
            },
            dataType: 'json',
            success: function () {

            }
        });
    });
</script>

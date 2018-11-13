@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display:inline-block;">List Users</div>
                        <div style="display:inline-block;float:right;"><button>
                                <a href="" data-toggle="modal" data-target="#userCreate">
                                    New User
                                </a>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-heading">
                        <div class="col-md-4">Fullname</div>
                        <div class="col-md-4">Email</div>
                        <div class="col-md-4">Role</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        @foreach($users as $user)
                            <div class="col-md-4">{{$user['firstname']}} {{$user['lastname']}}</div>
                            <div class="col-md-4">{{$user['email']}}</div>
                            <div class="col-md-4">{{$user['roleName']}}</div>
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
                    <div class="panel">
                        <div style="margin-bottom:10px;">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <input id="email" type="text" class="col-md-7" name="email" required autofocus>
                            <div class="clearfix"></div>
                        </div>
                        <div style="margin-bottom:10px;">
                            <label for="lastname" class="col-md-4 control-label">Lastname</label>
                            <input id="lastname" type="text" class="col-md-7" name="lastname" required autofocus>
                            <div class="clearfix"></div>
                        </div>
                        <div style="margin-bottom:10px;">
                            <label for="firstname" class="col-md-4 control-label">Firstname</label>
                            <input id="firstname" type="text" class="col-md-7" name="firstname" required autofocus>
                            <div class="clearfix"></div>
                        </div>
                        <label for="pm" class="col-md-4 control-label">Role</label>

                        <select class="col-md-7"  id="role" name="role" >
                            @foreach($roles as $role)
                                <option role_id="{{$role->id}}">{{$role->name}}</option>>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
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
            let errors = '';

            if ($('#email').val().trim() == '') {
                $('#email').css('border', '1px solid red');
                errors+= 'Email must be not empty. ';
            } else {
                $('#email').css('border', '1px solid #636b6f');
            }

            if ($('#lastname').val().trim() == '') {
                $('#lastname').css('border', '1px solid red');
                errors+= 'Lastname must be not empty. ';
            } else {
                $('#lastname').css('border', '1px solid #636b6f');
            }

            if ($('#firstname').val().trim() == '') {
                errors += 'Firstname must be not empty. ';
                $('#firstname').css('border', '1px solid red');
            } else {
                $('#firstname').css('border', '1px solid #636b6f');
            }

            if (errors !== '') {
                alert(errors);

                return false;
            }

            $.ajax({
                url: '/users/new',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').val(),   //If your header name has spaces or any other char not appropriate
                },
                data:{
                    'email':$('#email').val(),
                    'lastname':$('#lastname').val(),
                    'firstname':$('#firstname').val(),
                    'role':$('#role option:selected').attr('role_id')
                },
                dataType: 'json'
            })
            .done(function(answer) {
                document.location.reload();
            })
            .fail(function(jqXHR, textStatus) {
                console.log('Request failed: ' + textStatus);
            });
        });
    </script>

@endsection

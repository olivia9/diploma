<div id="newProject" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div id="crf_token">{{csrf_field()}}</div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Project</h4>
            </div>
            <div class="modal-body">
                <label for="name" class="col-md-4 control-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                <label for="key" class="col-md-4 control-label">Name</label>
                <input id="key" type="text" class="form-control" name="key" value="{{ old('name') }}" required autofocus>

                <label for="avatar" class="col-md-4 control-label">Avatar</label>
                <div class="col-md-6">
                    <input name="avatar" id="avatar" type="file" class="form-control" />
                </div>

                <label for="pm" class="col-md-4 control-label">Project Manager</label>


                    <select class="form-control"  id="pm" name="pm" >
                        @foreach($pmS as $id=>$name)
                            <option id="{{$id}}">{{$name}}</option>>

                        @endforeach

                    </select>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit new_project" data-dismiss="modal">Create</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".new_project",function(){

        var project = {
            'name' : $('#newProject #name').val(),
            'key' : $('#newProject #key').val(),
            'pm' : $('#pm option:selected').attr('id')
        };

        $.ajax({
            type: "POST",
            url: '/projects/new',
            data: project,
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

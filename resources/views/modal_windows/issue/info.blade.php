<div id="issueInfo" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div id="crf_token">{{csrf_field()}}</div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Info Issue</h4>
            </div>
            <div class="modal-body">
                <label for="project" class="col-md-4 control-label">Project</label>
                <input id="project" type="text" class="form-control"  disabled name="project" value="{{ old('name') }}" required autofocus>

                <label for="name" class="col-md-4 control-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                <label for="executor" class="col-md-4 control-label">Executor</label>
                <input id="executor" type="text" class="form-control" name="name" disabled value="{{ old('name') }}" required autofocus>

                <label for="status" class="col-md-4 control-label">Status</label>
                <input id="status"  type="text" class="form-control" disabled name="status" value="{{ old('name') }}" required autofocus>

                <label for="issue_type" class="col-md-4 control-label">Issue Type</label>
                <input id="issue_type" type="text" class="form-control" name="name" disabled value="{{ old('name') }}" required autofocus>

                <label for="complexity" class="col-md-4 control-label">Complexity</label>
                <input id="complexity" type="text" class="form-control" name="name" disabled value="{{ old('name') }}" required autofocus>

                <label for="estimated_time" class="col-md-4 control-label">Estimated time(hour)</label>
                <input id="estimated_time" type="number" class="form-control"  name="status" value="0">

                <label for="priority" class="col-md-4 control-label">Priority</label>
                <input id="priority" type="text" class="form-control" name="name" disabled value="{{ old('name') }}" required autofocus>

                <label for="spent_time" class="col-md-4 control-label">Estimated time(hour)</label>
                <input id="spent_time" type="number" class="form-control"  name="status" value="0">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit approve" data-dismiss="modal" data-toggle="modal" data-target="#issueRate">Approve</button>
                <button type="button" class="btn btn-default return" data-dismiss="modal">Return</button>
            </div>
        </div>
    </div>


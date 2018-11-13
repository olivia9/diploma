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
                <select id="executor" class="form-control">

                </select>

                <label for="status" class="col-md-4 control-label">Status</label>
                <input id="status"  type="text" class="form-control" disabled name="status" value="{{ old('name') }}" required autofocus>

                <label for="issue_type" class="col-md-4 control-label">Issue Type</label>
                <select id="issue_type" class="form-control">

                </select>

                <label for="complexity" class="col-md-4 control-label">Complexity</label>
                <select id="complexity" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label for="estimated_time" class="col-md-4 control-label">Estimated time(hour)</label>
                <input id="estimated_time" type="number" class="form-control"  name="status" value="0">

                <label for="priority" class="col-md-4 control-label">Priority</label>
                <select id="priority" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit new_issue" data-dismiss="modal">New Issue</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
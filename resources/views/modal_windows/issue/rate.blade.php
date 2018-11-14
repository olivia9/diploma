<div id="issueRate" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div id="crf_token">{{csrf_field()}}</div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rate Issue</h4>
            </div>
            <div class="modal-body">
                <label for="rate" class="col-md-4 control-label">Project</label>
                <select id="rate">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit rate" data-dismiss="modal">Rate</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
@section('side_panel')
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div >List Projects</div>
                    <button>
                        <a href="{{ url('/projects/new/form') }}">
                            New Project
                        </a>
                    </button>
                </div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>PM</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
@endsection


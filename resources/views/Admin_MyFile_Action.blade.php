@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List Doc File</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details Doc File
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>Desk id</th>
                              <th>Emp id</th>
                              <th>Remark</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Next desk id</th>
                              <th>No of warning</th>
                              <th>Status</th>
                            </tr>
                      </thead>
                      @foreach($varFile_Action as $row)
                      <tr>
                          <td>{{$row->Office_Desk_title}}</td>
                          <td>{{$row->Office_Entity_name}}</td>
                          <td>{{$row->File_Action_remark}}</td>
                          <td>{{$row->File_Action_Start_date}}</td>
                          <td>{{$row->File_Action_end_date}}</td>
                          <td>{{$row->File_Action_next_desk_id}}</td>
                          <td>{{$row->File_Action_no_of_warning}}</td>
                          <td>{{$row->File_Action_status}}</td>
                      </tr>
                        @endforeach
                        </table>
                </div>
            </div>

      </div> <!-- -->
    </div> <!-- -->

</div>
</div>
</div>
@endsection

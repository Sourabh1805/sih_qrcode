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

                              <th>Initiator id</th>
                              <th>Title</th>
                              <th>Remark</th>

                              <th>Task</th>
                              <th>Status</th>

                              <th>View</th>
                              <th>View Qrcode</th>
                              <th>View File action</th>

                            </tr>
                        </thead>
                        @foreach($users as $row)
                        <tr>

                          <td>{{$row->Initiator_name}}</td>
                          <td>{{$row->Doc_File_title}}</td>
                          <td>{{$row->Doc_File_remark}}</td>
                        <td>{{$row->Task_title}}</td>

                        <td>{{$row->Doc_File_status}}</td>

                        <td><a href="{{action('Doc_FileController@edit',$row->Doc_File_id)}}">View</a></td>
                        <td><a href="{{action('QrcodeController@edit',$row->Doc_File_QR_id)}}">View</a></td>

                        <td><a href="{{action('File_ActionController@adminmyfileaction',$row->Doc_File_QR_id)}}">File Action</a></td>


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

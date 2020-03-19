@extends('initiatorview/InitiatorMain')
@section('content')






<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>

                  <th>File title</th>
                  <th>File remark</th>

                  <th>File task </th>
                  <th>File status</th>
                  <th>View Qrcode</th>
                  <th>View Actions</th>


                </tr>
            </thead>
            @foreach($varDoc_File as $row)
            <tr>


              <td>{{$row->Doc_File_title}}</td>
              <td>{{$row->Doc_File_remark}}</td>
              <td>{{$row->Doc_File_task_id}}</td>

              <td>{{$row->Doc_File_status}}</td>


            <td><a href="{{action('QrcodeController@myqrcode',$row->Doc_File_QR_id)}}">View Qrcode</a></td>

            <td><a href="{{action('File_ActionController@myfileaction',$row->Doc_File_QR_id)}}">View Action</a></td>


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

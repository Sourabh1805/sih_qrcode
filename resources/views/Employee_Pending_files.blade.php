@extends('theme/EmployeeMain')
@section('content')






<div class="panel-body">


    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>

                  <th>File Name</th>
                  <th>Remark</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>No of warning</th>
                  <th>Status</th>
                  


                </tr>
            </thead>
            @foreach($varPendingFiles as $row)
            <tr>


                <td>{{$row->Doc_File_title}}</td>
                <td>{{$row->File_Action_remark}}</td>
                <td>{{$row->File_Action_Start_date}}</td>
                <td>{{$row->File_Action_end_date}}</td>

                <td>{{$row->File_Action_no_of_warning}}</td>
                <td>{{$row->File_Action_status}}</td>


            </tr>
            @endforeach
            </table>
    </div>



</div>
</div>
</div> <!-- -->
</div> <!-- -->
    </div>
</div>

</div> <!-- -->
</div> <!-- -->

</div>
</div>
</div>
@if(count($errors)>0)
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
@if(\Session::has('success'))
<p>{{Session::get('success')}}</p>
@endif
@endsection

@extends('theme/EmployeeMain')
@section('content')






<div class="panel-body">


  <form method='POST' action="{{route('searchfile.update',$File_Action_id)}}" enctype="multipart/form-date">
  @method('PATCH')
  {{csrf_field()}}
  <div class="form-group">
  <label>File name</label>
  <input class="form-control" type="text" name='Doc_File_title' value="{{$varFile_Action_Table[0]->Doc_File_title}}" readonly>
  </div>


  <div class="form-group">
  <label>Remark</label>
  <input class="form-control" type="text" name='File_Action_remark' value="{{$varFile_Action2->File_Action_remark}}" required>
  </div>


  <div class="form-group">
  <label> Status</label>
  <select class="form-control" type="text" name='File_Action_status' value="{{$varFile_Action2->File_Action_status}}" required>
    <option value="COMPLETED">Completed</option>
    <option value="PENDING">Pending</option>
  </select>
  </div>

  <div class="form-group">
  <input type="hidden" class="form-control" type="text" name='File_Action_emp_id' value="{{$varFile_Action2->File_Action_emp_id}}" required>
  </div>

  <div class="form-group">
  <input type="hidden" class="form-control" type="text" name='File_Action_desk_id' value="{{$varFile_Action2->File_Action_desk_id}}" required>
  </div>

  <div class="form-group">
  <input type="hidden" class="form-control" type="text" name='File_Action_Start_date' value="{{$varFile_Action2->File_Action_Start_date}}" required>
  </div>

  <div class="form-group">
  <input type="hidden" class="form-control" type="text" name='File_Action_file_id' value="{{$varFile_Action2->File_Action_file_id}}" required>
  </div>

  <div class="form-group">
  <input type="hidden" class="form-control" type="text" name='File_Action_next_desk_id' value="{{$varFile_Action2->File_Action_next_desk_id}}" required>
  </div>




  <button type="submit" class="btn btn-info">Update</button>
  </form>
<br><br><br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>

                  <th>Desk </th>
                  <th>Emp</th>
                  <th>Remark</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>No of warning</th>
                  <th>Status</th>


                </tr>
            </thead>
            @foreach($varFile_Action_Table as $row)
            <tr>


                <td>{{$row->Office_Desk_title}}</td>
                <td>{{$row->Office_Entity_name}}</td>
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

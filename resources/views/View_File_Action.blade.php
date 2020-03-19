@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

      <div id='page-inner'>
        <div class='row'>
<div class='col-md-12'>
<h1 class='page-head-line'>File_Action Profile</h1>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit File_Action Details
</div>

<div class="panel-body">
<form method='POST' action="{{route('file_action.update',$id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}


<div class="form-group">
<label> File_Action_file_id</label>
<input class="form-control" type="text" name='File_Action_file_id' value="{{$varFile_Action->File_Action_file_id}}" required>
</div>
<div class="form-group">
<label> File_Action_desk_id</label>
<input class="form-control" type="text" name='File_Action_desk_id' value="{{$varFile_Action->File_Action_desk_id}}" required>
</div>
<div class="form-group">
<label>File_Action_emp_id</label>
<input class="form-control" type="text" name='File_Action_emp_id' value="{{$varFile_Action->File_Action_emp_id}}" required>
</div>
<div class="form-group">
<label>File_Action_remark</label>
<input class="form-control" type="text" name='File_Action_remark' value="{{$varFile_Action->File_Action_remark}}" required>
</div>

<div class="form-group">
<label>File_Action_Start_date</label>
<input class="form-control" type="text" name='File_Action_Start_date' value="{{$varFile_Action->File_Action_Start_date}}" required>
</div>

<div class="form-group">
<label>File_Action_end_date</label>
<input class="form-control" type="text" name='File_Action_end_date' value="{{$varFile_Action->File_Action_end_date}}" required>
</div>
<div class="form-group">
<label>File_Action_next_desk_id</label>
<input class="form-control" type="text" name='File_Action_next_desk_id' value="{{$varFile_Action->File_Action_next_desk_id}}" required>
</div>
<div class="form-group">
<label>File_Action_no_of_warning</label>
<input class="form-control" type="text" name='File_Action_no_of_warning' value="{{$varFile_Action->File_Action_no_of_warning}}" required>
</div>

<div class="form-group">
<label>Status</label>
<input class="form-control" type="text" name='File_Action_status' value="{{$varFile_Action->File_Action_status}}" required>
</div>
<button type="submit" class="btn btn-info">Update</button>

</form>
</div></div></div></div></div></div></div></div></div>



@endsection

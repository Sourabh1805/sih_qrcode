@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>

      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Doc_File Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Doc_File Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('doc_file.update',$Doc_File_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}


<div class="form-group">
<label>Doc_File_title</label>
<input class="form-control" type="text" name='Doc_File_title' value="{{$varDoc_File->Doc_File_title}}" >
</div>



<div class="form-group">
<label>Doc_File_subject</label>
<input class="form-control" type="text" name='Doc_File_subject' value="{{$varDoc_File->Doc_File_subject}}" >
</div>
<div class="form-group">
<label>Doc_File_remark</label>
<input class="form-control" type="text" name='Doc_File_remark' value="{{$varDoc_File->Doc_File_remark}}" >
</div>
<div class="form-group">
<label>Doc_File_start_date</label>
<input class="form-control" type="text" name='Doc_File_start_date' value="{{$varDoc_File->Doc_File_start_date}}" >
</div>

<div class="form-group">
<label>Doc_File_end_date</label>
<input class="form-control" type="text" name='Doc_File_end_date' value="{{$varDoc_File->Doc_File_end_date}}" >
</div>
<div class="form-group">
<label>Doc_File_priority</label>
<input class="form-control" type="text" name='Doc_File_priority' value="{{$varDoc_File->Doc_File_priority}}" >
</div>

<div class="form-group">
<label>Doc_File_status</label>
<input class="form-control" type="text" name='Doc_File_status' value="{{$varDoc_File->Doc_File_status}}" >
</div>


<button type="submit" class="btn btn-info">Update</button>
</form>
</div>
<!-- /. ROW  --></div></div></div></div></div></div></div>
<!--/.ROW-->
</div>
<!-- /. PAGE INNER  -->

<!-- /. PAGE WRAPPER  -->
</div>
@endsection

@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>


      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>FileBunch</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit FileBunch Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('bunch.update',$File_Bunch_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">
<label>File_Bunch_office_id</label>
<input class="form-control" type="text" name='File_Bunch_office_id' value="{{$varFileBunch->File_Bunch_office_id}}" required>
</div>
<div class="form-group">
<label>File_Bunch_dept_id</label>
<input class="form-control" type="text" name='File_Bunch_dept_id' value="{{$varFileBunch->File_Bunch_dept_id}}" required>
</div>
<div class="form-group">
<label>File_Bunch_title</label>
<input class="form-control" type="text" name='File_Bunch_title' value="{{$varFileBunch->File_Bunch_title}}" required>
</div>
<div class="form-group">
<label>File_Bunch_year</label>
<input class="form-control" type="text" name='File_Bunch_year' value="{{$varFileBunch->File_Bunch_year}}" required>
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

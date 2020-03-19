@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>


      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Office Department Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Office Department Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('office_department.update',$Office_Department_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">
<label>office_Department_title</label>
<input class="form-control" type="text" name='Office_Department_title' value="{{$varOffice_Department->Office_Department_title}}" required>
</div>
<div class="form-group">
<label>office Department description</label>
<input class="form-control" type="text" name='Office_Department_description' value="{{$varOffice_Department->Office_Department_description}}" required>
</div>
<div class="form-group">
<label>Office Department initial</label>
<input class="form-control" type="text" name='Office_Department_initial' value="{{$varOffice_Department->Office_Department_initial}}" required>
</div>

<div class="form-group">
<label>Office Status</label>
<select class="form-control" type="text" name='Office_Department_status' value="{{$varOffice_Department->Office_Department_status}}" required>
 <option value="ACTIVE">Active</option>
 <option value="INACTIVE">Inactive</option>
</select>
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

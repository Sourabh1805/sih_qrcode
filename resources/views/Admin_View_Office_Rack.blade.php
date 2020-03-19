@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>


      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Office Rack Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Office Rack Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('rack.update',$Office_Rack_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">
<label> Office_Rack_office_id</label>
<input class="form-control" type="text" name='Office_Rack_office_id' value="{{$varOffice_Rack->Office_Rack_office_id}}" required>
</div>
<div class="form-group">
<label>Office_Rack_department_id	</label>
<input class="form-control" type="text" name='Office_Rack_department_id' value="{{$varOffice_Rack->Office_Rack_department_id}}" required>
</div>
<div class="form-group">
<label>Office_Rack_title</label>
<input class="form-control" type="text" name='Office_Rack_title' value="{{$varOffice_Rack->Office_Rack_title}}" required>
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

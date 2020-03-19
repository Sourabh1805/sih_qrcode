@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>


      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Office_Desk Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Office_Desk Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('office_desk.update',$Office_Desk_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}

<div class="form-group">
<label>Desk title</label>
<input class="form-control" type="text" name='Office_Desk_title' value="{{$varOffice_Desk->Office_Desk_title}}" required>
</div>
<div class="form-group">
<label>Time requried for desk in days</label>
<input class="form-control" type="text" name='Office_Desk_time_requried' value="{{$varOffice_Desk->Office_Desk_time_requried}}" required>
</div>


<div class="form-group">
<label>Desk Status</label>
<select class="form-control" type="text" name='Office_Desk_status' value="{{$varOffice_Desk->Office_Desk_status}}" required>
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

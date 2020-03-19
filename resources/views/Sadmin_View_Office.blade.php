@extends('theme/SadminMain')
@section('content')
<div id='wrapper'>


      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Office Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Office Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('office.update',$Office_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">
<label>Office_name</label>
<input class="form-control" type="text" name='Office_name' value="{{$varOffice->Office_name}}" required>
</div>
<div class="form-group">
<label>Office_country</label>
<input class="form-control" type="text" name='Office_country' value="{{$varOffice->Office_country}}" required>
</div>
<div class="form-group">
<label>Office_state</label>
<input class="form-control" type="text" name='Office_state' value="{{$varOffice->Office_state}}" required>
</div>
<div class="form-group">
<label>Office_district</label>
<input class="form-control" type="text" name='Office_district' value="{{$varOffice->Office_district}}" required>
</div>
<div class="form-group">
<label>Office_city</label>
<input class="form-control" type="text" name='Office_city' value="{{$varOffice->Office_city}}" required>
</div>
<div class="form-group">
<label>Office_initial</label>
<input class="form-control" type="text" name='Office_initial' value="{{$varOffice->Office_initial}}" required>
</div>


<div class="form-group">
<label>Office Status</label>
<select class="form-control" type="text" name='Office_status' value="{{$varOffice->Office_status}}" required>
 <option value="ACTIVE">Active</option>
 <option value="INACTIVE">Inactive</option>
</select>
</div>



<button type="submit"  class="btn btn-info">Update</button>
</form>
</div>
</div>
<!-- /. ROW  --></div></div></div></div></div></div></div>
<!--/.ROW-->
</div>
<!-- /. PAGE INNER  -->

<!-- /. PAGE WRAPPER  -->
</div>
@endsection

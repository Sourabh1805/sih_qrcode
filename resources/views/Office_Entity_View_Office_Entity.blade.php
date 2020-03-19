@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>

      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Office_Entity Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Office_Entity Details
</div>

<div class="panel-body">
<form method='POST' action="{{route('office_entity.update',$id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}


<div class="form-group">
<label>type</label>
<input class="form-control" type="text" name='Office_Entity_type' value="{{$varOffice_Entity->Office_Entity_type}}" required>
</div>
<div class="form-group">
<label>Mobile Number</label>
<input class="form-control" type="text" name='Office_Entity_mobile_number' value="{{$varOffice_Entity->Office_Entity_mobile_number}}" pattern="[6-9]{1}[0-9]{9}" title="Must contain atleast 10 digit Mobile Number" required>
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name='Office_Entity_password' value="{{$varOffice_Entity->Office_Entity_password}}" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
</div>
<div class="form-group">
<label>Email id</label>
<input class="form-control" type="email" name='Office_Entity_email_id' value="{{$varOffice_Entity->Office_Entity_email_id}}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>
</div>
<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name='Office_Entity_name' value="{{$varOffice_Entity->Office_Entity_name}}" required>
</div>


<div class="form-group">
<label>office</label>
<input class="form-control" type="text" name='Office_Entity_office_id' value="{{$varOffice_Entity->Office_Entity_office_id}}" required>
</div>


<div class="form-group">
<label>department</label>
<input class="form-control" type="text" name='Office_Entity_department_id' value="{{$varOffice_Entity->Office_Entity_department_id}}" required>
</div>

<div class="form-group">
<label>Post</label>
<input class="form-control" type="text" name='Office_Entity_office_post_id' value="{{$varOffice_Entity->Office_Entity_office_post_id}}" >
</div>




<div class="form-group">
  <label>desk</label>
  <input class="form-control" type="text" name='Office_Entity_desk_id' value="{{$varOffice_Entity->Office_Entity_desk_id}}" >
  </div>
  <div class="form-group">



<label>Gender</label>
<!--input class="form-control" type="text" name='Office_Entity_gender' value="{{$varOffice_Entity->Office_Entity_gender}}" required-->
<select class="form-control" name="Office_Entity_gender" value="{{$varOffice_Entity->Office_Entity_gender}}" required>
 <option value="Male">Male</option>
 <option value="Female">Female</option>
 <option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label>Address</label>
<input class="form-control" type="text" name='Office_Entity_address' value="{{$varOffice_Entity->Office_Entity_address}}" required>
</div>
<div class="form-group">
<label>City</label>
<input class="form-control" type="text" name='Office_Entity_city' value="{{$varOffice_Entity->Office_Entity_city}}" required>
</div>
<div class="form-group">
<label>Pincode</label>
<input class="form-control" type="text" name='Office_Entity_pincode' value="{{$varOffice_Entity->Office_Entity_pincode}}" pattern="[0-9]{6}" required>
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

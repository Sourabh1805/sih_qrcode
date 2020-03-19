@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

      <div id='page-inner'>
        <div class='row'>
<div class='col-md-12'>
<h1 class='page-head-line'>HeadLine</h1>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Initiator Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('initiator.update',$Initiator_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}


<div class="form-group">
<label>Initiator Mobile Number</label>
<input class="form-control" type="text" name='Initiator_mobile_number' value="{{$varInitiator->Initiator_mobile_number}}" pattern="[6-9]{1}[0-9]{9}" title="Must contain atleast 10 digit Mobile Number" required>
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="text" name='Initiator_password' value="{{$varInitiator->Initiator_password}}"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
</div>
<div class="form-group">
<label>Email ID</label>
<input class="form-control"  name='Initiator_email_id' value="{{$varInitiator->Initiator_email_id}}" type="email" name='Office_Entity_email_id' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" title=" Invalid Email"required>
</div><div class="form-group">
<label>Full Name</label>
<input class="form-control" type="text" name='Initiator_name' value="{{$varInitiator->Initiator_name}}" required>
</div><div class="form-group">
<label>Department</label>
<input class="form-control" type="text" name='Initiator_department' value="{{$varInitiator->Initiator_department}}" required>
</div><div class="form-group">
<label>Gender</label>
<input class="form-control" type="text" name='Initiator_gender' value="{{$varInitiator->Initiator_gender}}" required>
</div><div class="form-group">
<label>Address</label>
<input class="form-control" type="text" name='Initiator_address' value="{{$varInitiator->Initiator_address}}" required>
</div><div class="form-group">
<label>City</label>
<input class="form-control" type="text" name='Initiator_city' value="{{$varInitiator->Initiator_city}}" required>
</div><div class="form-group">
<label>Pincode</label>
<input class="form-control" type="text" name='Initiator_pincode' value="{{$varInitiator->Initiator_pincode}}" required>
</div>




<button type="submit" class="btn btn-info">Update</button>

</form>
</div>
<!-- /. ROW  --></div></div></div></div></div></div></div>
<!--/.ROW-->

<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>



@endsection

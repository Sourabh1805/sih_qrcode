@extends('theme/SadminMain')
@section('content')
<div id='wrapper'>


    <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Office Posts</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Office_Desk Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('officepost.update',$Office_Posts_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">

<div class="form-group">
<label>Office_Posts_title</label>
<input class="form-control" type="text" name='Office_Posts_title' value="{{$varOffice_Post->Office_Posts_title}}" required>
</div>
<div class="form-group">
<label>Office_Posts_description</label>
<input class="form-control" type="text" name='Office_Posts_description' value="{{$varOffice_Post->Office_Posts_description}}" required>
</div>


<div class="form-group">
<label>Post Status</label>
<select class="form-control" type="text" name='Office_Posts_status' value="{{$varOffice_Post->Office_Posts_status}}" required>
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

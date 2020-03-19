@extends('theme/AdminMain')
@section('content')
<div id='wrapper'>

      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Task Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Task Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('task.update',$Task_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">
<label> Task_departmet</label>
<input class="form-control" type="text" name='Task_title' value="{{$varTask->Task_title}}" required>
</div>
<div class="form-group">
<label>Task_title</label>
<input class="form-control" type="text" name='Task_description' value="{{$varTask->Task_description}}" required>
</div>
<div class="form-group">
<label>Task_time_requried</label>
<input class="form-control" type="text" name='Task_no_of_desk' value="{{$varTask->Task_no_of_desk}}" required>
</div>
<div class="form-group">
<label>Task_status</label>
<input class="form-control" type="text" name='Task_desk_list' value="{{$varTask->Task_desk_list}}" required>
</div>

<div class="form-group">
<label>Task_status</label>
<input class="form-control" type="text" name='Task_time_requried' value="{{$varTask->Task_time_requried}}" required>
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

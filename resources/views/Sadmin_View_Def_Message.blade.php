@extends('theme/SadminMain')
@section('content')
<div id='wrapper'>

      <div id='page-inner'>
        <div class='row'>

<div class='col-md-12'>
<h1 class='page-head-line'>Def_Message Profile</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Edit Def_Message Details
</div>
<div class="panel-body">
<form method='POST' action="{{route('def_message.update',$Def_Messages_id)}}" enctype="multipart/form-date">
@method('PATCH')
{{csrf_field()}}
<div class="form-group">
<label>Def_Messages_title</label>
<input class="form-control" type="text" name='Def_Messages_title' value="{{$varDef_Message->Def_Messages_title}}" required>
</div>
<div class="form-group">
<label>Def_Messages_text</label>
<input class="form-control" type="text" name='Def_Messages_text' value="{{$varDef_Message->Def_Messages_text}}" required>
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

@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>
    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Add new Rack</h1>
        </div>
      </div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Add new Rack
        </div>
        <div class="panel-body">
            <form role="form" method='POST' action='{{action('Office_RackController@store')}}'>
          {{csrf_field()}}

          <div class="form-group">
                <label>Office_Rack_title</label>
                <input class="form-control" type="text" name='Office_Rack_title' required>
          </div>

                        <button type="submit" class="btn btn-info">Add </button>

                    </form>
            </div>
          @if(count($errors)>0)
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
          @endif
          @if(\Session::has('success'))
          <p>{{Session::get('success')}}</p>
          @endif
<!-- /. ROW  -->
</div>
</div>
</div>
</div>
</div>

@endsection

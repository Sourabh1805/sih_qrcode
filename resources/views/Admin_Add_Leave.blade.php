@extends('theme/AdminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Insert Office_Desk details</h1>
        </div>
      </div>



<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Insert Office_Desk
        </div>

        <div class="panel-body">
            <form role="form" method='POST' action='{{action('AddLeaveController@store')}}'>
          {{csrf_field()}}
          <div class="group-input">
            <label>Add leave to :</label>
            <select class="form-control" name="Leave_to" required>
             <option></option>
             <option value="ALL">ALL</option>
             <option value="Specific">To Specific Employee</option>
            </select>
          </div>
              <br>
                <button type="submit" class="btn btn-info">Add </button>
                </form>
            </div>



          <!-- /. ROW  -->

                  </div>
                      </div>

  </div>
            </div>
        </div>
            </div>

</div>
<!--/.ROW-->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
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


@endsection

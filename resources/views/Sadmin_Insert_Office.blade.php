@extends('theme/SadminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>New Office</h1>
        </div>
      </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Office details
        </div>
        <div class="panel-body">
            <form role="form" method='POST' action='{{action('OfficeController@store')}}'>
          {{csrf_field()}}


          <div class="form-group">
              <label>Enter Office_name :</label>
              <input class="form-control" type="text" name='Office_name' required>
              <!--input class="form-control" type="number" name='Leave_employee_id' required-->
          </div>

                 <div class="form-group">
                            <label>Enter Office_country :</label>
                            <input class="form-control" type="text" name='Office_country' required>

                        </div>
                        <div class="form-group">
                                   <label>Enter Office_state :</label>
                                   <input class="form-control" type="text" name='Office_state' required>

                               </div>
                               <div class="form-group">
                                          <label>Enter Office_district :</label>
                                          <input class="form-control" type="text" name='Office_district'>

                                      </div>
                                <div class="form-group">
                                       <label>Enter Office_city :</label>
                                       <input class="form-control" type="text" name='Office_city'>

                                </div>
                                <div class="form-group">
                                           <label>Enter Office_initial :</label>
                                           <input class="form-control" type="text" name='Office_initial'>

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
            </div>

</div>
<!--/.ROW-->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>



@endsection

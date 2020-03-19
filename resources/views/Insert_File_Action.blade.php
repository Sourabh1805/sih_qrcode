@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Insert File_Action details</h1>
        </div>
      </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Insert File_Action
        </div>

        <div class="panel-body">
            <form role="form" method='POST' action='{{action('File_ActionController@store')}}'>
          {{csrf_field()}}

          <div class="form-group">
              <label>Enter  File_Action file_id:</label>
              <input class="form-control" type="text" name='File_Action_file_id' required>
          </div>


          <div class="form-group">
                <label>Enter File_Action desk_id:</label>
                <input class="form-control" type="text" name='File_Action_desk_id' required>
          </div>

          <div class="form-group">
                  <label>Enter File_Action emp_id :</label>
                  <input class="form-control" type="text" name='File_Action_emp_id' required>
          </div>

          <div class="form-group">
                  <label>Enter File_Action remark :</label>
                  <input class="form-control" type="text" name='File_Action_remark' required>
          </div>

           <div class="form-group">
                    <label>Enter File_Action Start_date :</label>
                    <input class="form-control" type="text" name='File_Action_Start_date'>
          </div>

          <div class="form-group">
                   <label>Enter File_Action end_date :</label>
                   <input class="form-control" type="text" name='File_Action_end_date'>
         </div>

         <div class="form-group">
                  <label>Enter File_Action next_desk_id :</label>
                  <input class="form-control" type="text" name='File_Action_next_desk_id'>
        </div>

        <div class="form-group">
                 <label>Enter File_Action no_of_warning :</label>
                 <input class="form-control" type="text" name='File_Action_no_of_warning'>
       </div>

       <div class="form-group">
                <label>Enter File_Action status :</label>
                <input class="form-control" type="text" name='File_Action_status'>
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

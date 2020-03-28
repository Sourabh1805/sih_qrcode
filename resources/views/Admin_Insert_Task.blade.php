@extends('theme/AdminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Insert Task details</h1>
        </div>
      </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Insert Task
        </div>

        <div class="panel-body">
            <form role="form" method='POST' action='{{action('TaskController@store')}}'>
          {{csrf_field()}}

          <div class="form-group">
              <label>Enter  Task title:</label>
              <input class="form-control" type="text" name='Task_title' required>
          </div>


          <div class="form-group">
                <label>Enter Task description:</label>
                <input class="form-control" type="text" name='Task_description' required>
          </div>

          <div class="form-group">
                  <label>Enter no of desk :</label>
                  <input class="form-control" type="text" name='Task_no_of_desk' required>
          </div>

          <div class="form-group">
                   <label>Enter desk list :</label>
                   <select multiple="multiple" class="form-control" name="Task_desk_list[]">
                     @foreach($varOffice_Desk as $row)
                        <option value="{{$row->

                          Office_Desk_id}}">{{$row->Office_Desk_title}}</option>
                     @endforeach
                   </select>
                   <!--input class="form-control" type="text" name='Doc_File_task_id'-->
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
   </body>

@endsection

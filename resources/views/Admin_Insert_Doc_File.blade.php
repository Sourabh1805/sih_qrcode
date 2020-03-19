@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Insert File details</h1>
        </div>
      </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           File
        </div>


        <div class="panel-body">
            <form role="form" method='POST' action='{{action('Doc_FileController@store')}}'>
          {{csrf_field()}}

          <div class="form-group">
                   <label>select HR mobile number</label>
                   <select class="form-control" name="Doc_File_initiator_id">
                     @foreach($varInitiator as $row)
                        <option value="{{$row['Initiator_id']}}">{{$row['Initiator_mobile_number']}}</option>
                     @endforeach
                   </select>
                   <!--input class="form-control" type="text" name='Doc_File_task_id'-->
         </div>



                 <div class="form-group">
                            <label>Enter File title :</label>
                            <input class="form-control" type="text" name='Doc_File_title' >
                </div>


                               <div class="form-group">
                                          <label>Enter File subject :</label>
                                          <input class="form-control" type="text" name='Doc_File_subject'>
                              </div>

                                      <div class="form-group">
                                                 <label>Enter File remark :</label>
                                                 <input class="form-control" type="text" name='Doc_File_remark'>

                                             </div>

                                  <div class="form-group">
                                           <label>select File task  :</label>
                                           <select class="form-control" name="Doc_File_task_id">
                                             @foreach($vartask as $row)
                                                <option value="{{$row['Task_id']}}">{{$row['Task_title']}}</option>
                                             @endforeach
                                           </select>
                                           <!--input class="form-control" type="text" name='Doc_File_task_id'-->
                                 </div>

                                 <div class="form-group">
                                          <label>select File priority:</label>
                                          <select class="form-control" name="Doc_File_priority" required>
                                           <option value="High">High</option>
                                           <option value="Low">Low</option>
                                          </select>
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

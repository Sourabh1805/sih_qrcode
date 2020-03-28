@extends('theme/SadminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Add Employee</h1>
        </div>
      </div>



<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
          Employee
        </div>
        <div class="panel-body">
            <form role="form" method='POST' action='{{action('Office_EntityController@store')}}'>
          {{csrf_field()}}

          <div class="form-group">
              <label>Enter Employee type:</label>
              <select class="form-control" name="Office_Entity_type" required>
               <option value="Employee">Employee</option>
               <option value="Admin">Admin</option>
              </select>
          </div>

          <div class="form-group">
              <label>Enter Employee Mobile Number:</label>
              <input class="form-control" type="number" name='Office_Entity_mobile_number' pattern="[6-9]{1}[0-9]{9}" title="Must contain atleast 10 digit Mobile Number" required>
          </div>

                 <div class="form-group">
                            <label>Enter Employee password :</label>
                            <input class="form-control" type="password" name='Office_Entity_password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <div class="form-group">
                                   <label>Enter Employee Email id :</label>
                                   <input class="form-control" type="email" name='Office_Entity_email_id' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" title=" Invalid Email" required>
                       </div>

                               <div class="form-group">
                                          <label>Enter Employee name :</label>
                                          <input class="form-control" type="text" name='Office_Entity_name' required>
                                </div>


                                  <div class="form-group">
                                               <label>Enter Employee Office :</label>
                                               <select class="form-control" name="Office_Entity_office_id" required>
                                                 @foreach($varOffice as $row)
                                                    <option value="{{$row['Office_id']}}">{{$row['Office_name']}}</option>
                                                 @endforeach
                                               </select>
                                               <!--input class="form-control" type="text" name='Doc_File_task_id'-->
                                     </div>



                                     <div class="form-group">
                                              <label>Enter Employee department :</label>
                                              <select class="form-control" name="Office_Entity_department_id" required>
                                                @foreach($varOffice_Department as $row)
                                                   <option value="{{$row['Office_Department_id']}}">{{$row['Office_Department_title']}}</option>
                                                @endforeach
                                              </select>
                                              <!--input class="form-control" type="text" name='Doc_File_task_id'-->
                                    </div>


                                    <div class="form-group">
                                             <label>Enter Employee post :</label>
                                             <select class="form-control" name="Office_Entity_office_post_id" >
                                               <option ></option>
                                               @foreach($varOffice_Posts as $row)
                                                  <option value="{{$row['Office_Posts_id']}}">{{$row['Office_Posts_title']}}</option>
                                               @endforeach
                                             </select>
                                             <!--input class="form-control" type="text" name='Doc_File_task_id'-->
                                    </div>



                                      <div class="form-group">
                                               <label>Enter Employee desk_id :</label>
                                               <select class="form-control" name="Office_Entity_desk_id">
                                                 <option ></option>
                                                 @foreach($varOffice_Desk as $row)
                                                    <option value="{{$row['Office_Desk_id']}}">{{$row['Office_Desk_title']}}</option>
                                                 @endforeach
                                               </select>
                                               <!--input class="form-control" type="text" name='Doc_File_task_id'-->
                                     </div>



                                      <div class="form-group">
                                          <label>Enter Employee gender :</label>
                                          <select class="form-control" name="Office_Entity_gender" required>
                                           <option value="Male">Male</option>
                                           <option value="Female">Female</option>
                                           <option value="Other">Other</option>
                                          </select>
                                      </div>

                                   <div class="form-group">
                                            <label>Enter Employee address :</label>
                                            <input class="form-control" type="text" name='Office_Entity_address'required>
                                  </div>
                                  <div class="form-group">
                                           <label>Enter Employee city :</label>
                                           <input class="form-control" type="text" name='Office_Entity_city'required>
                                 </div>

                             <div class="form-group">
                                          <label>Enter Employee pincode :</label>
                                          <input class="form-control" type="number" name='Office_Entity_pincode'pattern="[0-9]{6}" title="Invalid pincode" required>
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

@extends('initiatorview/InitiatorMain')
@section('content')











<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Registration </h2>
                        <form role="form" method='POST' action='{{action('InitiatorController@store')}}'>
                      {{csrf_field()}}

                            <div class="group-input">
                              <label>Enter mobile number:</label>
                              <input class="form-control" type="text" name='Initiator_mobile_number' pattern="[6-9]{1}[0-9]{9}" title="Must contain atleast 10 digit Mobile Number"required>
                            </div>





                            <div class="group-input">
                              <label>Enter password:</label>
                              <input class="form-control" type="password" name='Initiator_password'pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            </div>

                            <div class="group-input">
                              <label>Enter Initiator Email id :</label>
                              <input class="form-control" name='Initiator_email_id' type="email" name='Office_Entity_email_id' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" title=" Invalid Email" required>
                            </div>


                            <div class="group-input">
                              <label>Enter name :</label>
                              <input class="form-control" type="text" name='Initiator_name' required>
                            </div>




                            <div class="group-input">
                              <label>Enter gender :</label>
                              <select class="form-control" name="Initiator_gender" required>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                               <option value="Other">Other</option>
                              </select>
                            </div>

                            <div class="group-input">

                              <label>Enter address :</label>
                              <input class="form-control" type="text" name='Initiator_address' required>
                    </div>


                    <div class="form-group">
                             <label>Enter city :</label>
                             <input class="form-control" type="text" name='Initiator_city' required>
                   </div>


                   <div class="group-input">
                     <label>Enter pincode:</label>
                     <input class="form-control" type="text" name='Initiator_pincode'pattern="[0-9]{6}" title="invalid pincode" required>
                   </div>



                                          <button type="submit" class="btn btn-info">Register </button>

                                      </form>
                        </form>
                        <div class="switch-login">
                            <a href="/login" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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














<!--


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Insert Initiator details</h1>
        </div>
      </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Insert Initiator
        </div>

        <div class="panel-body">
            <form role="form" method='POST' action='{{action('InitiatorController@store')}}'>
          {{csrf_field()}}


          <div class="form-group">
              <label>Enter  Initiator mobile_number:</label>
              <input class="form-control" type="text" name='Initiator_mobile_number' pattern="[6-9]{1}[0-9]{9}" title="Must contain atleast 10 digit Mobile Number"required>
          </div>


          <div class="form-group">
                <label>Enter Initiator password:</label>
                <input class="form-control" type="password" name='Initiator_password'pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </div>

          <div class="form-group">
                  <label>Enter Initiator email_id :</label>
                  <input class="form-control" name='Initiator_email_id' type="email" name='Office_Entity_email_id' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" title=" Invalid Email"required>
          </div>

          <div class="form-group">
                  <label>Enter Initiator name :</label>
                  <input class="form-control" type="text" name='Initiator_name' required>
          </div>







                   <div class="form-group">
                       <label>Enter Initiator gender :</label>
                       <select class="form-control" name="Initiator_gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                       </select>
                   </div>

         <div class="form-group">
                  <label>Enter Initiator address :</label>
                  <input class="form-control" type="text" name='Initiator_address'>
        </div>

        <div class="form-group">
                 <label>Enter Initiator city :</label>
                 <input class="form-control" type="text" name='Initiator_city'>
       </div>

       <div class="form-group">
                <label>Enter Initiator pincode :</label>
                <input class="form-control" type="text" name='Initiator_pincode'>
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


          <! /. ROW end >

                  </div>
                      </div>

  </div>
            </div>
        </div>
            </div>

</div>
</.ROW end>



</. PAGE INNER  >
</div>
<!/. PAGE WRAPPER  >
</div>

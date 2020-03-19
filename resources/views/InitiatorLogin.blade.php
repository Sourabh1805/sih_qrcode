@extends('initiatorview/InitiatorMain')
@section('content')



<!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                      <h2>Login</h2>
                      <form action="{{ URL::to('check')}}" method="post">
                        {{ csrf_field()}}

                        <div class="group-input" hidden>
                          <input class="form-control" type="hidden" name='utype' value="valueInitiator" > </input>
                          </div>



                          <div class="form-group">
                            <div class="group-input">

                              <input type="number"  class="form-control" placeholder="Mobile Number" name='Current_UserName' required="required" autofocus="autofocus">

                            </div>
                          </div>

                          <div class="form-group">
                            <div class="group-input">

                              <input type="password"  class="form-control" placeholder="Password" name='Current_Password' required>

                            </div>
                          </div>


                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>


                        <div class="switch-login">
                            <a href="/initiator/create" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->



  @endsection

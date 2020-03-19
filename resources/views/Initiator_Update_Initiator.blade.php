@extends('theme/InitiatorMain')
@section('content')



<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List Initiatores</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details Initiator
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Mobile number</th>
                              <th>Password</th>
                              <th>Email_id</th>



                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varInitiator as $row)
                        <tr>
                          <td>{{$row['Initiator_name']}}</td>
                        <td>{{$row['Initiator_mobile_number']}}</td>
                        <td>{{$row['Initiator_password']}}</td>
                        <td>{{$row['Initiator_email_id']}}</td>




                        <td><a href="{{action('InitiatorController@edit',$row['Initiator_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('InitiatorController@destroy',$row['Initiator_id'])}}">
                            @csrf
                            @method('DELETE')
                            <input type='submit' name='submit' value='Delete'>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                        </table>
                </div>
            </div>

      </div> <!-- -->
    </div> <!-- -->

</div>
</div>
</div>
@endsection

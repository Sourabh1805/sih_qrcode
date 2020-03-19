@extends('theme/AdminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Office Rack</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Add new Office Rack
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>

                              <th>Office_Rack_office_id</th>
                              <th>Office_Rack_department_id</th>
                              <th>Office_Rack_title</th>

                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varOffice_Rack as $row)
                        <tr>

      <td>{{$row['Office_Rack_office_id']}}</td>
      <td>{{$row['Office_Rack_department_id']}}</td>
      <td>{{$row['Office_Rack_title']}}</td>

      <td><a href="{{action('Office_RackController@edit',$row['Office_Rack_id'])}}">View</a></td>
      <td>
                          <form method="POST" action="{{action('Office_RackController@destroy',$row['Office_Rack_id'])}}">
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
        </div>
      </div> <!-- -->
    </div> <!-- -->

</div>
</div>
</div>
@endsection

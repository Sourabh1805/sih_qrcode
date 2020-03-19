@extends('theme/SadminMain')
@section('content')



<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List of Office</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details Office
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>Office_name</th>
                              <th>Office_country</th>
                              <th>Office_state</th>
                              <th>Office_district</th>
                              <th>Office_city</th>
                              <th>Office_initial</th>
                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varOffice as $row)
                        <tr>

                        <td>{{$row['Office_name']}}</td>
                        <td>{{$row['Office_country']}}</td>
                        <td>{{$row['Office_state']}}</td>
                        <td>{{$row['Office_district']}}</td>
                        <td>{{$row['Office_city']}}</td>
                        <td>{{$row['Office_initial']}}</td>

                        <td><a href="{{action('OfficeController@edit',$row['Office_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('OfficeController@destroy',$row['Office_id'])}}">
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

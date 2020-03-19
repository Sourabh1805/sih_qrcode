@extends('theme/SadminMain')
@section('content')



<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List Office_Departmentes</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details Office_Departmentes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>Department title</th>
                              <th>Office description</th>
                              <th>Office initial</th>

                              <th>Office status</th>



                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varOffice_Department as $row)
                        <tr>

                        <td>{{$row['Office_Department_title']}}</td>
                        <td>{{$row['Office_Department_description']}}</td>
                        <td>{{$row['Office_Department_initial']}}</td>

                        <td>{{$row['Office_Department_status']}}</td>



                        <td><a href="{{action('Office_DepartmentController@edit',$row['Office_Department_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('Office_DepartmentController@destroy',$row['Office_Department_id'])}}">
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

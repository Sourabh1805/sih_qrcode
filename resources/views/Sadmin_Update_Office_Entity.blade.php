@extends('theme/SadminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List of Employees</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Employee Details
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <!--th>Type</th-->
                              <th>Mobile_number</th>
                              <th>Name</th>
                              <th>Office</th>
                              <th>Departmet</th>
                              <th>Post</th>

                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varOffice_Entity as $row)
                        <tr>
                        <td>{{$row['Office_Entity_mobile_number']}}</td>
                        <td>{{$row['Office_Entity_name']}}</td>
                        <td>{{$row['Office_name']}}</td>
                        <td>{{$row['Office_Dpartment_department_title']}}</td>
                        <td>{{$row['Office_Posts_title']}}</td>


                        <td><a href="{{action('Office_EntityController@edit',$row['Office_Entity_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('Office_EntityController@destroy',$row['Office_Entity_id'])}}">
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

@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Office Posts</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details Taskes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>


                              <th>Office_Posts_title</th>
                              <th>Office_Posts_description</th>
                              <th>Office_Posts_status</th>
                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varOffice_Post as $row)
                        <tr>


      <td>{{$row['Office_Posts_title']}}</td>
      <td>{{$row['Office_Posts_description']}}</td>
      <td>{{$row['Office_Posts_status']}}</td>

                        <td><a href="{{action('Office_PostController@edit',$row['Office_Posts_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('Office_PostController@destroy',$row['Office_Posts_id'])}}">
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

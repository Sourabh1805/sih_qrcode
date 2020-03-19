@extends('theme/AdminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List Taskes</h1>
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

                              <th>Task_title</th>
                              <th>Task_description</th>
                              <th>Task_no_of_desk</th>
                              <th>Task_desk_list</th>
                              <th>Task_time_requried</th>
                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varTask as $row)
                        <tr>

                        <td>{{$row->Task_title}}</td>
      <td>{{$row->Task_description}}</td>
      <td>{{$row->Task_no_of_desk}}</td>
      <td>{{$row->Task_desk_list}}</td>
      <td>{{$row->Task_time_requried}}</td>

                        <td><a href="{{action('TaskController@edit',$row->Task_id)}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('TaskController@destroy',$row->Task_id)}}">
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

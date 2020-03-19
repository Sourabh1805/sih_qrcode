@extends('theme/AdminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List Office Deskes </h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details of the Office Deskes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>

                              <th>Desk_title</th>
                              <th>Desk time</th>


                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varOffice_Desk as $row)
                        <tr>


                        <td>{{$row['Office_Desk_title']}}</td>
                        <td>{{$row['Office_Desk_time_requried']}}</td>


                        <td><a href="{{action('Office_DeskController@edit',$row['Office_Desk_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('Office_DeskController@destroy',$row['Office_Desk_id'])}}">
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

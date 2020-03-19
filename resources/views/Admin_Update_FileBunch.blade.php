@extends('theme/AdminMain')
@section('content')



<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List of FileBunch</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details FileBunch
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>File_Bunch_office_id</th>
                              <th>File_Bunch_dept_id</th>
                              <th>File_Bunch_title</th>
                              <th>File_Bunch_year</th>
                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varFileBunch as $row)
                        <tr>

                        <td>{{$row['File_Bunch_office_id']}}</td>
                        <td>{{$row['File_Bunch_dept_id']}}</td>
                        <td>{{$row['File_Bunch_title']}}</td>
                        <td>{{$row['File_Bunch_year']}}</td>

                        <td><a href="{{action('File_BunchController@edit',$row['File_Bunch_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('File_BunchController@destroy',$row['File_Bunch_id'])}}">
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

@extends('theme/AdminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List File Actiones</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details File Actiones
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>file title</th>
                              <th>Desk title</th>
                              <th>Emp name</th>
                              <th>Remark</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Next desk id</th>
      <th>Warnings</th>
      <th>Status</th>
                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varFile_Action as $row)
                        <tr>

                        <td>{{$row->Doc_File_title}}</td>
                        <td>{{$row->Office_Desk_title}}</td>
                        <td>{{$row->Office_Entity_name}}</td>
                        <td>{{$row->File_Action_remark}}</td>
                        <td>{{$row->File_Action_Start_date}}</td>
                        <td>{{$row->File_Action_end_date}}</td>
                        <td>{{$row->Office_Desk_title}}</td>
                        <td>{{$row->File_Action_no_of_warning}}</td>
                        <td>{{$row->File_Action_status}}</td>

                        <td><a href="{{action('File_ActionController@edit',$row->File_Action_id)}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('File_ActionController@destroy',$row->File_Action_id)}}">
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

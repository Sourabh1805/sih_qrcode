@extends('theme/SadminMain')
@section('content')


<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>List Def_Messagees</h1>
        </div>
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 Details Def_Messagees
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>Def_Messages_title</th>
                              <th>varDef_Message</th>


                              <th>View</th>
                              <th>Delete</th>

                            </tr>
                        </thead>
                        @foreach($varDef_Message as $row)
                        <tr>

                        <td>{{$row['Def_Messages_title']}}</td>
                        <td>{{$row['Def_Messages_text']}}</td>


                        <td><a href="{{action('Def_MessageController@edit',$row['Def_Messages_id'])}}">View</a></td>
                        <td>
                          <form method="POST" action="{{action('Def_MessageController@destroy',$row['Def_Messages_id'])}}">
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

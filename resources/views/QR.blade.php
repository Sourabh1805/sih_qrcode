


@extends('theme/AdminMain')
@section('content')

<div id='wrapper'>

    <div id='page-inner'>
      <div class='row'>
        <div class='col-md-12'>
          <h1 class='page-head-line'>Qrcode</h1>
        </div>
      </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-info">
        <div class="panel-heading">
           Qrcode
        </div>

        <div class="panel-body">

          <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('sikkimlogo.png', 0.3, true)
                        ->size(500)->errorCorrection('H')
                        ->generate($id)) !!} ">

          </div>
          <form  enctype="multipart/form-date">
          @method('PATCH')
          {{csrf_field()}}
          <div class="form-group">
                  <label>Applicant Name</label>
                  <input class="form-control" type="text" name='Initiator_name' value="{{$varInitiator->Initiator_name}}" required>
          </div>

          <div class="form-group">
                  <label>Office </label>
                  <input class="form-control" type="text" name='Office_name' value="{{$varOfiice->Office_name}}" required>
          </div>

          <div class="form-group">
                  <label>Department</label>
                  <input class="form-control" type="text" name='OfficeDepartment_name' value="{{$varOfficeDepartment->Office_Department_title}}" required>
          </div>




          <div class="form-group">
                  <label>Task name</label>
                  <input class="form-control" type="text" name='Task_title' value="{{$varTask->Task_title}}" required>
          </div>

          <div class="form-group">
                  <label>File title</label>
                  <input class="form-control" type="text" name='Doc_File_title' value="{{$varFile_Action[0]->Doc_File_title}}" required>
          </div>

</form>

          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>

                        <th>Desk </th>
                        <th>Emp</th>
                        <th>sign</th>

                      </tr>
                  </thead>
                  @foreach($varFile_Action as $row)
                  <tr>


                      <td>{{$row->Office_Desk_title}}</td>
                      <td>{{$row->Office_Entity_name}}</td>
                      <td>             </td>



                  </tr>
                  @endforeach
                  </table>
          </div>

                      </div>

  </div>
            </div>
        </div>
            </div>





@endsection

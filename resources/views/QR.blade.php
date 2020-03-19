


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
          <!-- /. ROW  -->

                  </div>
                      </div>

  </div>
            </div>
        </div>
            </div>





@endsection

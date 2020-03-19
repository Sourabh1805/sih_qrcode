@extends('initiatorview/InitiatorMain')
@section('content')





<div class="panel-body">

      <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('sikkimlogo.png', 0.3, true)
                    ->size(500)->errorCorrection('H')
                    ->generate($id)) !!} ">
    </div>

@endsection

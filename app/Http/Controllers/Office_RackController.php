<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfficeRack;

class Office_RackController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$varOffice_Rack = OfficeRack::get()->toArray();
return view('Admin_Update_Office_Rack',compact('varOffice_Rack'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('Admin_Insert_Office_Rack');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
  if(!session('Current_User_type') == 'Admin')
  {
    return view('welcome');
  }
  $Temp_Current_User_id=session('Current_User_id');
  $Temp_Current_office_id=session('Current_office_id');
  $Temp_Current_department_id=session('Current_department_id');
$varOffice_Rack = new OfficeRack([
'Office_Rack_office_id'=> $Temp_Current_office_id,
'Office_Rack_department_id'=> $Temp_Current_department_id,
'Office_Rack_title'=> $request->get('Office_Rack_title'),
]);
$varOffice_Rack->save();

echo "<script>alert('Data is inserted ...')</script>";
return view('Admin_Insert_Office_Rack');


}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($Office_Rack_id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($Office_Rack_id)
{
$varOffice_Rack=OfficeRack::find($Office_Rack_id);
return view('Admin_View_Office_Rack',compact('varOffice_Rack','Office_Rack_id'));

}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $Office_Rack_id)
{
$varOffice_Rack =  OfficeRack::find($Office_Rack_id);
$varOffice_Rack->Office_Rack_office_id= $request->get('Office_Rack_office_id');
$varOffice_Rack->Office_Rack_department_id= $request->get('Office_Rack_department_id');
$varOffice_Rack->Office_Rack_title= $request->get('Office_Rack_title');

$varOffice_Rack->save();
return redirect ('/rack');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($Office_Rack_id)
{
$varOffice_Rack = OfficeRack::find($Office_Rack_id);
$varOffice_Rack->delete();
echo"<script>alert('Deleted')</script>";
$varOffice_Rack=OfficeRack::get()->toArray();
return view('Admin_Update_Office_Rack',compact('varOffice_Rack'));
}
}

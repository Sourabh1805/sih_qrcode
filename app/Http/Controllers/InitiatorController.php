<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Initiator;
use App\OfficeDepartment;

class InitiatorController extends Controller
{
    /**
     * Display a listing of the resource.

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if(!session('Current_User_type') == 'SUPERADMIN')
      {
        return view('welcome');
      }
      $varInitiator=Initiator::get()->toArray();
      return view('Initiator_Update_Initiator',compact('varInitiator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Insert_Initiator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $varInitiator = new Initiator([
      'Initiator_mobile_number'=> $request->get('Initiator_mobile_number'),
      'Initiator_password'=> $request->get('Initiator_password'),
      'Initiator_email_id'=> $request->get('Initiator_email_id'),
      'Initiator_name'=> $request->get('Initiator_name'),

      'Initiator_gender'=> $request->get('Initiator_gender'),
      'Initiator_address'=> $request->get('Initiator_address'),
      'Initiator_city'=> $request->get('Initiator_city'),
      'Initiator_pincode'=> $request->get('Initiator_pincode'),
      ]);
      $varInitiator->save();
      echo "<script>alert('Data is inserted ...')</script>";

      return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Initiator_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Initiator_id)
    {
      if(!session('Current_User_type') == 'SUPERADMIN')
      {
        return view('welcome');
      }
      $varInitiator=Initiator::find($Initiator_id);
      return view('View_Initiator',compact('varInitiator','Initiator_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Initiator_id)
    {
      $varInitiator =  Initiator::find($Initiator_id);
      $varInitiator->Initiator_mobile_number= $request->get('Initiator_mobile_number');
      $varInitiator->Initiator_password= $request->get('Initiator_password');
      $varInitiator->Initiator_email_id= $request->get('Initiator_email_id');
      $varInitiator->Initiator_name= $request->get('Initiator_name');

      $varInitiator->Initiator_gender= $request->get('Initiator_gender');
      $varInitiator->Initiator_address= $request->get('Initiator_address');
      $varInitiator->Initiator_city= $request->get('Initiator_city');
      $varInitiator->Initiator_pincode= $request->get('Initiator_pincode');

      $varInitiator->save();
      return redirect ('/initiator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Initiator_id)
    {
      $varInitiator = Initiator::find($Initiator_id);
      $varInitiator->delete();
      echo"<script>alert('Deleted')</script>";
      $varInitiator=Initiator::get()->toArray();
      return view('Initiator_Update_Initiator',compact('varInitiator'));
    }
}

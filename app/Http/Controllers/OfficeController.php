<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;


class OfficeController extends Controller
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
       $varOffice=Office::get()->toArray();
       return view('Sadmin_Update_Office',compact('varOffice'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
         return view('Sadmin_Insert_Office');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice= new Office([
       'Office_name'=> $request->get('Office_name'),
       'Office_country'=> $request->get('Office_country'),
       'Office_state'=> $request->get('Office_state'),
       'Office_district'=> $request->get('Office_district'),
       'Office_city'=> $request->get('Office_city'),
       'Office_initial'=> $request->get('Office_initial')
       ]);
       $varOffice->save();
       echo "<script>alert('Data is inserted ...')</script>";
       return view('Sadmin_Insert_Office');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($Office_id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($Office_id)
     {

       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice=Office::find($Office_id);
       return view('Sadmin_View_Office',compact('varOffice','Office_id'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $Office_id)
     {

       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice=  Office::find($Office_id);
       $varOffice->Office_name= $request->get('Office_name');
       $varOffice->Office_country= $request->get('Office_country');
       $varOffice->Office_state= $request->get('Office_state');
       $varOffice->Office_district= $request->get('Office_district');
       $varOffice->Office_city= $request->get('Office_city');
       $varOffice->Office_initial= $request->get('Office_initial');
       $varOffice->Office_status= $request->get('Office_status');

       $varOffice->save();
       return redirect ('/office');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($Office_id)
     {

       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice = Office::find($Office_id);
       $varOffice->delete();
       echo"<script>alert('Deleted')</script>";
       $varOffice=Office::get()->toArray();
       return view('Sadmin_Update_Office',compact('varOffice'));
     }
 }

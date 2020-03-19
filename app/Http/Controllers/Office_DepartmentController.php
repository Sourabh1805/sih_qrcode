<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfficeDepartment;


class Office_DepartmentController extends Controller
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

       $varOffice_Department=OfficeDepartment::get()->toArray();
       return view('Sadmin_Update_Office_Department',compact('varOffice_Department'));

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
         return view('Sadmin_Insert_Office_Department');
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
       $varOffice_Department= new OfficeDepartment([
       'Office_Department_title'=> $request->get('Office_Department_title'),
       'Office_Department_description'=> $request->get('Office_Department_description'),
       'Office_Department_initial'=> $request->get('Office_Department_initial'),


       ]);
       $varOffice_Department->save();
       echo "<script>alert('Data is inserted ...')</script>";
       return view('Sadmin_Insert_Office_Department');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($Office_Department_id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($Office_Department_id)
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice_Department=OfficeDepartment::find($Office_Department_id);
       return view('Sadmin_View_Office_Department',compact('varOffice_Department','Office_Department_id'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $Office_Department_id)
     {

       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice_Department=  OfficeDepartment::find($Office_Department_id);
       $varOffice_Department->Office_Department_title= $request->get('Office_Department_title');
       $varOffice_Department->Office_Department_description= $request->get('Office_Department_description');
       $varOffice_Department->Office_Department_initial= $request->get('Office_Department_initial');
       $varOffice_Department->Office_Department_status= $request->get('Office_Department_status');



       $varOffice_Department->save();
       return redirect ('/office_department');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($Office_Department_id)
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice_Department = OfficeDepartment::find($Office_Department_id);
       $varOffice_Department->delete();
       echo"<script>alert('Deleted')</script>";
       $varOffice_Department=OfficeDepartment::get()->toArray();
       return view('Sadmin_Update_Office_Department',compact('varOffice_Department'));
     }
 }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfficePost;


class Office_PostController extends Controller
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
       $varOffice_Post = OfficePost::get()->toArray();
       return view('Sadmin_Update_Office_Post',compact('varOffice_Post'));
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
         return view('Sadmin_Insert_Office_Post');
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
       $varOffice_Post = new OfficePost([

       'Office_Posts_title'=> $request->get('Office_Posts_title'),
       'Office_Posts_description'=> $request->get('Office_Posts_description'),


       ]);
       $varOffice_Post->save();

       echo "<script>alert('Data is inserted ...')</script>";
       return view('Sadmin_Insert_Office_Post');


     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($Office_Posts_id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($Office_Posts_id)
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice_Post=OfficePost::find($Office_Posts_id);
       return view('Sadmin_View_Office_Post',compact('varOffice_Post','Office_Posts_id'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $Office_Posts_id)
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice_Post =  OfficePost::find($Office_Posts_id);

       $varOffice_Post->Office_Posts_title= $request->get('Office_Posts_title');
       $varOffice_Post->Office_Posts_description= $request->get('Office_Posts_description');
       $varOffice_Post->Office_Posts_status= $request->get('Office_Posts_status');

       $varOffice_Post->save();
       return redirect ('/officepost');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($Office_Posts_id)
     {
       if(!session('Current_User_type') == 'SUPERADMIN')
       {
         return view('welcome');
       }
       $varOffice_Post = OfficePost::find($Office_Posts_id);
       $varOffice_Post->delete();
       echo"<script>alert('Deleted')</script>";
       $varOffice_Post=OfficePost::get()->toArray();
       return view('Sadmin_Update_Office_Post',compact('varOffice_Post'));
     }
    }

<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DefMessage;

class Def_MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       if(session('Current_User_id') and session('Current_User_type')== 'SUPERADMIN')
       {
       $varDef_Message=DefMessage::get()->toArray();
       return view('Sadmin_Update_Def_Message',compact('varDef_Message'));
        }
        else {
          return view('welcome');
        }
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       if(session('Current_User_id') and session('Current_User_type')== 'SUPERADMIN')
       {
         return view('Sadmin_Insert_Def_Message');
       }
       else {
         return view('welcome');
       }
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       if(session('Current_User_id') and session('Current_User_type')== 'SUPERADMIN')
       {
       $varDef_Message= new DefMessage([
       'Def_Messages_title'=> $request->get('Def_Messages_title'),
       'Def_Messages_text'=> $request->get('Def_Messages_text'),
       'Def_Messages_office_id'=>1,
       'Def_Messages_department_id'=>1,
       ]);
       $varDef_Message->save();
       echo "<script>alert('Data is inserted ...')</script>";
       return view('Sadmin_Insert_Def_Message');
     }
     else {
       return view('welcome');
     }
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($Def_Messages_id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($Def_Messages_id)
     {
       if(session('Current_User_type')== 'SUPERADMIN')
       {
       $varDef_Message=DefMessage::find($Def_Messages_id);
       return view('Sadmin_View_Def_Message',compact('varDef_Message','Def_Messages_id'));
     }
     else {
       return view('welcome');
     }
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $Def_Messages_id)
     {
       if(session('Current_User_type')== 'SUPERADMIN')
       {
       $varDef_Message=  DefMessage::find($Def_Messages_id);
       $varDef_Message->Def_Messages_title= $request->get('Def_Messages_title');
       $varDef_Message->Def_Messages_text= $request->get('Def_Messages_text');


       $varDef_Message->save();
       return redirect ('/def_message');
     }
     else {
       return view('welcome');
     }
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($Def_Messages_id)
     {
       if(session('Current_User_type')== 'SUPERADMIN')
       {
       $varDef_Message = DefMessage::find($Def_Messages_id);
       $varDef_Message->delete();
       echo"<script>alert('Deleted')</script>";
       $varDef_Message=DefMessage::get()->toArray();
       return view('Sadmin_Update_Def_Message',compact('varDef_Message'));
     }

   else {
     return view('welcome');
   }
 }
 }

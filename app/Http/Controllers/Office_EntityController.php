<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfficeEntity;
use App\OfficeDepartment;
use App\Office;
use App\OfficeDesk;
use App\OfficePost;
use Illuminate\Support\Facades\DB;





class Office_EntityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       if(session('Current_User_type') == 'valueAdmin')
       {
         $Temp_Current_User_id=session('Current_User_id');
         $Temp_Current_office_id=session('Current_office_id');
         $Temp_Current_department_id=session('Current_department_id');


         $varOffice_Entity= DB::table('office_entities')
                          ->where([['office_entities.Office_Entity_office_id','=',$Temp_Current_office_id],
                                    ['office_entities.Office_Entity_department_id','=',$Temp_Current_department_id]
                        ])
                        ->join('office_posts','office_posts.Office_Posts_id','=','office_entities.Office_Entity_office_post_id')
                        ->join('office_desks','office_desks.Office_Desk_id','=','office_entities.Office_Entity_desk_id')
                        ->get()->toArray();
         return view('Admin_Update_Office_Entity',compact('varOffice_Entity'));

       }

       if(session('Current_User_type') == 'SUPERADMIN')
       {



         $varOffice_Entity= DB::table('office_entities')
                        ->join('offices','offices.Office_id','=','office_entities.Office_Entity_office_id')
                        ->join('office_departments','office_departments.Office_Department_id','=','office_entities.Office_Entity_department_id')
                        ->join('office_posts','office_posts.Office_Posts_id','=','office_entities.Office_Entity_office_post_id')
                        ->join('office_desks','office_desks.Office_Desk_id','=','office_entities.Office_Entity_desk_id')
                        ->get()->toArray();
          print_r($varOffice_Entity);
          exit();
         return view('Sadmin_Update_Office_Entity',compact('varOffice_Entity'));

       }

       return view('welcome');

     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       if(session('Current_User_type') == 'valueAdmin')
       {

         $Temp_Current_User_id=session('Current_User_id');
         $Temp_Current_office_id=session('Current_office_id');
         $Temp_Current_department_id=session('Current_department_id');

        $varOffice_Desk= DB::table('office_desks')
                        ->where([['office_desks.Office_Desk_office_id','=',$Temp_Current_office_id],
                                ['office_desks.Office_Desk_department_id','=',$Temp_Current_department_id]])
                                ->get()->toArray();

             $varOffice_Posts = OfficePost::get()->toArray();

             return view('Admin_Insert_Office_Entity',compact('varOffice_Desk','varOffice_Posts'));
      }

      if(session('Current_User_type') == 'SUPERADMIN')
      {

     }

      return view('welcome');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       if(session('Current_User_type') == 'valueAdmin')
       {
         $Temp_Current_User_id=session('Current_User_id');
         $Temp_Current_office_id=session('Current_office_id');
         $Temp_Current_department_id=session('Current_department_id');

         $varOffice_Entity= new OfficeEntity([
                           'Office_Entity_type'=> "Employee",
                           'Office_Entity_mobile_number'=> $request->get('Office_Entity_mobile_number'),
                           'Office_Entity_password'=> $request->get('Office_Entity_password'),
                           'Office_Entity_email_id'=> $request->get('Office_Entity_email_id'),
                           'Office_Entity_name'=> $request->get('Office_Entity_name'),
                           'Office_Entity_office_id'=> $Temp_Current_office_id,
                           'Office_Entity_department_id'=> $Temp_Current_department_id,
                           'Office_Entity_office_post_id'=> $request->get('Office_Entity_office_post_id'),
                           'Office_Entity_desk_id'=> $request->get('Office_Entity_desk_id'),
                           'Office_Entity_gender'=> $request->get('Office_Entity_gender'),
                           'Office_Entity_address'=> $request->get('Office_Entity_address'),
                           'Office_Entity_city'=> $request->get('Office_Entity_city'),
                           'Office_Entity_pincode'=> $request->get('Office_Entity_pincode'),
         ]);
               $varOffice_Entity->save();
               echo "<script>alert('Data is inserted ...')</script>";
               $varOffice_Desk= DB::table('office_desks')
                               ->where([['office_desks.Office_Desk_office_id','=',$Temp_Current_office_id],
                                       ['office_desks.Office_Desk_department_id','=',$Temp_Current_department_id]])
                                       ->get()->toArray();

                    $varOffice_Posts = OfficePost::get()->toArray();

                    return view('Admin_Insert_Office_Entity',compact('varOffice_Desk','varOffice_Posts'));

        if(session('Current_User_type') == 'SUPERADMIN')
        {

        }


         return view('welcome');


     }

   }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($Office_Entity_id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($Office_Entity_id)
     {
       //$id = session('uid');

       if(!session('Current_User_type') == 'Admin')
       {
         return view('welcome');
       }
       $varOffice_Entity=OfficeEntity::find($Office_Entity_id);
       return view('Office_Entity_View_Office_Entity',compact('varOffice_Entity','Office_Entity_id'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $Office_Entity_id)
     {
       if(!session('Current_User_type') == 'Admin')
       {
         return view('welcome');
       }
       $varOffice_Entity=  OfficeEntity::find($Office_Entity_id);
       $varOffice_Entity->Office_Entity_type= $request->get('Office_Entity_type');
       $varOffice_Entity->Office_Entity_mobile_number= $request->get('Office_Entity_mobile_number');
       $varOffice_Entity->Office_Entity_password= $request->get('Office_Entity_password');
       $varOffice_Entity->Office_Entity_email_id= $request->get('Office_Entity_email_id');
       $varOffice_Entity->Office_Entity_name= $request->get('Office_Entity_name');
       $varOffice_Entity->Office_Entity_office_id= $request->get('Office_Entity_office_id');
       $varOffice_Entity->Office_Entity_department_id= $request->get('Office_Entity_department_id');
       $varOffice_Entity->Office_Entity_office_post_id= $request->get('Office_Entity_office_post_id');


       $varOffice_Entity->Office_Entity_desk_id= $request->get('Office_Entity_desk_id');

       $varOffice_Entity->Office_Entity_gender= $request->get('Office_Entity_gender');
       $varOffice_Entity->Office_Entity_address=$request->get('Office_Entity_address');
       $varOffice_Entity->Office_Entity_city= $request->get('Office_Entity_city');
       $varOffice_Entity->Office_Entity_pincode= $request->get('Office_Entity_pincode');

       $varOffice_Entity->save();
       return redirect ('office_entity');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($Office_Entity_id)
     {
       if(!session('Current_User_type') == 'Admin')
       {
         return view('welcome');
       }
       $varOffice_Entity = OfficeEntity::find($Office_Entity_id);
       $varOffice_Entity->delete();
       echo"<script>alert('Deleted')</script>";
       $varOffice_Entity=OfficeEntity::get()->toArray();
       return view('Office_Entity_Update_Office_Entity',compact('varOffice_Entity'));
     }
     }

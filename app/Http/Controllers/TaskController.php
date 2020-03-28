<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\OfficeDesk;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
      $Temp_Current_User_id=session('Current_User_id');
      $Temp_Current_office_id=session('Current_office_id');
      $Temp_Current_department_id=session('Current_department_id');

      $varTask = DB::table('tasks')->where([
                        ['Task_office_id', '=', $Temp_Current_office_id],
                        ['Task_department_id', '=', $Temp_Current_department_id],

            ])->get()->toArray();


      return view('Admin_Update_Task',compact('varTask'));
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

        $varOffice_Desk = DB::table('office_desks')->where([
                          ['Office_Desk_office_id', '=', $Temp_Current_office_id],
                          ['Office_Desk_department_id', '=', $Temp_Current_department_id],
                          ['Office_Desk_title','!=',"GENRAL DESK"]
              ])->get()->toArray();
        return view('Admin_Insert_Task',compact('varOffice_Desk'));
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
      $var=$request->get('Task_desk_list');

      $temp= json_encode($var);

      $arr=json_decode($temp);

      $sum=0;
      foreach($arr as $r)
      {
        $tempfun=DB::table('office_desks')
                        ->where('Office_Desk_id', $r)->get()->toArray();

        $sum=$sum+$tempfun[0]->Office_Desk_time_requried;


      }


      $Temp_Current_User_id=session('Current_User_id');
      $Temp_Current_office_id=session('Current_office_id');
      $Temp_Current_department_id=session('Current_department_id');

      $varTask= new Task([
      'Task_title'=> $request->get('Task_title'),
      'Task_description'=> $request->get('Task_description'),
      'Task_no_of_desk'=> $request->get('Task_no_of_desk'),
      'Task_desk_list'  => $temp,
      'Task_time_requried'=> $sum,
      'Task_office_id'=> $Temp_Current_office_id,
      'Task_department_id'=> $Temp_Current_department_id,
      ]);
      $varTask->save();
      echo "<script>alert('Data is inserted ...')</script>";



        $varOffice_Desk = DB::table('office_desks')->where([
                          ['Office_Desk_office_id', '=', $Temp_Current_office_id],
                          ['Office_Desk_department_id', '=', $Temp_Current_department_id],
                          ['Office_Desk_title','!=',"GENRAL DESK"]
              ])->get()->toArray();
        return view('Admin_Insert_Task',compact('varOffice_Desk'));
      }
        return view('welcome');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Task_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Task_id)
    {
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
      $varTask=Task::find($Task_id);
      return view('Admin_View_Task',compact('varTask','Task_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Task_id)
    {
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
      $varTask= Task::find($Task_id);
      $varTask->Task_title= $request->get('Task_title');
      $varTask->Task_description= $request->get('Task_description');
      $varTask->Task_no_of_desk= $request->get('Task_no_of_desk');
      $varTask->Task_desk_list  = $request->get('Task_desk_list');
      $varTask->Task_time_requried= $request->get('Task_time_requried');
      $varTask->Task_time_status= $request->get('Task_time_status');
      $varTask->save();
      return redirect ('/task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Task_id)
    {
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
      $varTask = Task::find($Task_id);
      $varTask->delete();
      echo"<script>alert('Deleted')</script>";
      $varTask= Task::get()->toArray();
      return view('Admin_Update_Task',compact('varTask'));
    }
}

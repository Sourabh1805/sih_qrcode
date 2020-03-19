<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileAction;
use Illuminate\Support\Facades\DB;


class File_ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




      if(session('Current_User_type') == 'SUPERADMIN')
      {
        $Temp_Current_User_id=session('Current_User_id');
        $Temp_Current_office_id=session('Current_office_id');
        $Temp_Current_department_id=session('Current_department_id');



              $varFile_Action = DB::table('file_actions')
                    ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
                    ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
                    ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
                    ->get()->toArray();


        return view('Sadmin_Update_File_Action',compact('varFile_Action'));
      }


      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
      // normal admin

      $Temp_Current_User_id=session('Current_User_id');
      $Temp_Current_office_id=session('Current_office_id');
      $Temp_Current_department_id=session('Current_department_id');



            $varFile_Action = DB::table('file_actions')
            ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
            ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
            ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
            ->where([  ['Doc_File_office_id', '=', $Temp_Current_office_id],
                       ['Doc_File_department_id', '=', $Temp_Current_department_id],
                ])->get()->toArray();


      return view('Update_File_Action',compact('varFile_Action'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
        return view('Insert_File_Action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(!session('Current_User_type'))
      {
        return view('welcome');
      }
      $varFile_Action= new FileAction([
      'File_Action_file_id'=> $request->get('File_Action_file_id'),
      'File_Action_desk_id'=> $request->get('File_Action_desk_id'),
      'File_Action_emp_id'=> $request->get('File_Action_emp_id'),
      'File_Action_remark'=> $request->get('File_Action_remark'),

      'File_Action_next_desk_id'=> $request->get('File_Action_next_desk_id'),
      'File_Action_no_of_warning'=> $request->get('File_Action_no_of_warning'),
      'File_Action_status'=> $request->get('File_Action_status'),
      ]);
      $varFile_Action->save();
      echo "<script>alert('Data is inserted ...')</script>";
      return view('Insert_File_Action');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($File_Action_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($File_Action_id)
    {
      if(!session('Current_User_type'))
      {
        return view('welcome');
      }
      $varFile_Action=FileAction::find($File_Action_id);
      return view('View_File_Action',compact('varFile_Action','File_Action_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $File_Action_id)
    {
      if(!session('Current_User_type'))
      {
        return view('welcome');
      }
            $varFile_Action= FileAction::find($File_Action_id);
            $varFile_Action->File_Action_file_id= $request->get('File_Action_file_id');
            $varFile_Action->File_Action_desk_id= $request->get('File_Action_desk_id');
            $varFile_Action->File_Action_emp_id= $request->get('File_Action_emp_id');
            $varFile_Action->File_Action_remark= $request->get('File_Action_remark');
            $varFile_Action->File_Action_Start_date= $request->get('File_Action_Start_date');
            $varFile_Action->File_Action_end_date= $request->get('File_Action_end_date');
            $varFile_Action->File_Action_next_desk_id= $request->get('File_Action_next_desk_id');
            $varFile_Action->File_Action_no_of_warning= $request->get('File_Action_no_of_warning');
            $varFile_Action->File_Action_status= $request->get('File_Action_status');

            $varFile_Action->save();
            return redirect ('/file_action');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($File_Action_id)
    {
      if(!session('Current_User_type'))
      {
        return view('welcome');
      }
      $varFile_Action = FileAction::find($File_Action_id);
      $varFile_Action->delete();
      echo"<script>alert('Deleted')</script>";
      $varFile_Action=FileAction::get()->toArray();
      return view('Update_File_Action',compact('varFile_Action'));
    }






    public function myfileaction($File_Action_id)
    {
      if(session('Current_User_id'))
      {
        //print_r ($File_Action_id);
          //exit();
      $Temp_Current_User_id=session('Current_User_id');
      $varFile_Action = DB::table('file_actions')->where([
                        ['File_Action_file_id', '=', $File_Action_id],
            ])->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
            ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
            ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
            ->get()->toArray();

           //print_r($varFile_Action);
           //exit();
      return view('Initator_MyFile_Actions',compact('varFile_Action'));
    }

    return view('InitiatorLogin');
    }




    public function adminmyfileaction($File_Action_file_id)
    {

      if(session('Current_User_id'))
      {


        $Temp_Current_User_id=session('Current_User_id');
        $varFile_Action = DB::table('file_actions')
            ->where([['File_Action_file_id', '=', $File_Action_file_id],])
              ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
              ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
              ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
              ->get()->toArray();
            

      return view('Admin_MyFile_Action',compact('varFile_Action'));
    }

    return view('welcome');
    }




}

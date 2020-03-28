<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocFile;
use Illuminate\Support\Facades\DB;
use App\FileAction;

class PendingFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(session('Current_User_type') == 'valueEmployee')
      {

        $Temp_Current_User_id=session('Current_User_id');
        $Temp_Current_office_id=session('Current_office_id');
        $Temp_Current_department_id=session('Current_department_id');

        $varPendingFiles = DB::table('file_actions')
                          ->where([['file_actions.File_Action_emp_id','=',$Temp_Current_User_id],
                                    ['file_actions.File_Action_status','!=',"COMPLETED"]
                                  ])
                          ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
                          ->orderBy('file_actions.File_Action_end_date','desc')
                          ->get()->toArray();

        return view('Employee_Pending_files',compact('varPendingFiles'));

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

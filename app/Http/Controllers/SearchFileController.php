<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocFile;
use App\FileAction;
use App\OfficeDesk;
use Illuminate\Support\Facades\DB;


class SearchFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Employee_Search_File');
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

      if(session('Current_User_type') == 'valueEmployee')
      {

                $Temp_Current_User_id=session('Current_User_id');
                $Temp_Current_office_id=session('Current_office_id');
                $Temp_Current_department_id=session('Current_department_id');

              $varFile_Action = DB::table('file_actions')
              ->where([         ['File_Action_file_id', '=', $request->get('File_Action_file_id'),],
                                ['File_Action_emp_id', '=', $Temp_Current_User_id]
                    ])->get()->toArray();



              if(sizeof($varFile_Action)==0)
              {
                echo "<script>alert('File Does not belong to you or enter valid file id')</script>";
                return view('Employee_Search_File');
              }
              else {

                $File_Action_id=$varFile_Action[0]->File_Action_id;


                      $varFile_Action2=FileAction::find($File_Action_id);

                      $varFile_Action_Table = DB::table('file_actions')
                      ->where([['File_Action_file_id', '=',$varFile_Action[0]->File_Action_file_id]  ])
                      ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
                      ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
                      ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
                      ->get()->toArray();

                      return view('Employee_Update_File_Status',compact('varFile_Action_Table','varFile_Action','File_Action_id','varFile_Action2'));
          }





        }

        return view('welcome');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request, $File_Action_id)
    {

        // search file

            if(session('Current_User_type') == 'valueEmployee')
            {


            date_default_timezone_set('Asia/Kolkata');
            $d=strtotime("now");
            $TempCurrentDate= date("Y-m-d",$d);
            $d=strtotime("+1 day",$d);
            $TempNextDate= date("Y-m-d", $d);

            $varFile_Action=  FileAction::find($File_Action_id);
            $varFile_Action->File_Action_status=$request->get('File_Action_status');
            $varFile_Action->File_Action_remark=$request->get('File_Action_remark');


            if($request->get('File_Action_status')=="COMPLETED")
            {
              $File_Action_next_desk_id=$request->get('File_Action_next_desk_id');

              if($File_Action_next_desk_id)
              {
                  $varFile_Action->File_Action_end_date=$TempCurrentDate;



                  //update next desk action

                  $NextDeskId=$varFile_Action['File_Action_next_desk_id'];


                  $varNext_File_Action =DB::table('file_actions')
                                        ->where([['file_actions.File_Action_file_id','=',$request->get('File_Action_file_id')],
                                              ['file_actions.File_Action_desk_id','=',$NextDeskId]
                                            ])
                                          ->get()->toArray();

                  $varNext_File_Action=FileAction::find($varNext_File_Action[0]->File_Action_id);

                  $varNextDeskId= OfficeDesk::find($NextDeskId);



                  $now=strtotime("now");
                  $TempCurrentDate= date("Y-m-d", $now);
                  $d=strtotime("+1 day",$now);
                  $TempNextDate= date("Y-m-d",$d);

                  $File_Action_end_date="+".$varNextDeskId['Office_Desk_time_requried']."day";
                  $File_Action_end_date=strtotime($File_Action_end_date,$now);
                  $File_Action_end_date= date("Y-m-d",$File_Action_end_date);


                //  print_r($varNext_File_Action[0]->File_Action_file_id);
                //  exit();
                  $varNext_File_Action->File_Action_status="ON GOING";
                  $varNext_File_Action->File_Action_end_date=$File_Action_end_date;
                  $varNext_File_Action->File_Action_Start_date=$TempCurrentDate;


                  $varNext_File_Action->save();



              }
              else
              {
                  $varDocfileid=DB::table('doc_files')
                              ->where([['doc_files.Doc_File_QR_id','=',$varFile_Action->File_Action_file_id]])
                              ->get()->toArray();

                  $varDoc_File=DocFile::find($varDocfileid[0]->Doc_File_id);

                  $varDoc_File->Doc_File_status="COMPLETED";
                  $varDoc_File->Doc_File_end_date=$TempCurrentDate;

                  $varDoc_File->save();
              }

            }

            $varFile_Action->save();


            return redirect ('searchfile');
          }
      return view('welcome');

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

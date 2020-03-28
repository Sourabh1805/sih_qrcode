<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DocFile;
use App\Initiator;
use App\Task;
use App\OfficeDepartment;
use Illuminate\Support\Facades\DB;
use App\OfficeEntity;
use App\FileAction;
use App\Office;



class QrcodeController extends Controller
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
            $id = session("fid");


            $varFile_Action = DB::table('file_actions')
                ->where([['File_Action_file_id', '=', $id],])
                  ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
                  ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
                  ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
                  ->get()->toArray();

            $Initiator_id=$varFile_Action[0]->Doc_File_initiator_id;
            $Task_id=$varFile_Action[0]->Doc_File_task_id;

            $varInitiator = Initiator::find($Initiator_id);
            $varTask= Task::find($Task_id);

            $varOfficeDepartment = OfficeDepartment::find($Temp_Current_department_id);
            $varOfiice= Office::find($Temp_Current_office_id);

            return view('QR',compact('id','varFile_Action','varInitiator','varTask','varOfficeDepartment','varOfiice'));
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
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }



      $Temp_Current_User_id=session('Current_User_id');
      $Temp_Current_office_id=session('Current_office_id');
      $Temp_Current_department_id=session('Current_department_id');



      $varFile_Action = DB::table('file_actions')
          ->where([['File_Action_file_id', '=', $id],])
            ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
            ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
            ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'file_actions.File_Action_desk_id')
            ->get()->toArray();

      $Initiator_id=$varFile_Action[0]->Doc_File_initiator_id;
      $Task_id=$varFile_Action[0]->Doc_File_task_id;

      $varInitiator = Initiator::find($Initiator_id);
      $varTask= Task::find($Task_id);

      $varOfficeDepartment = OfficeDepartment::find($Temp_Current_department_id);
      $varOfiice= Office::find($Temp_Current_office_id);



      return view('QR',compact('id','varFile_Action','varInitiator','varTask','varOfficeDepartment','varOfiice'));
    }



    public function myqrcode($id)
    {
      if(!session('Current_User_type') == 'valueInitiator')
      {
        return view('welcome');
      }
      return view('InitiatorQrcode',compact('id'));
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

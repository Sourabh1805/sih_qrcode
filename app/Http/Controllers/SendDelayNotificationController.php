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
use App\Mail\sendemail;
use Illuminate\Support\Facades\Mail;
use App\Office;


class SendDelayNotificationController extends Controller
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

            date_default_timezone_set('Asia/Kolkata');
            $d=strtotime("now");
            $TempCurrentDate= date("Y-m-d", $d);

            $d=strtotime("+5 day",$d);
            $TempNextDate= date("Y-m-d",$d);


            $varFile_Action = DB::table('file_actions')
                            ->where([['file_actions.File_Action_status','=',"On going"]])
                            ->join('doc_files', 'doc_files.Doc_File_QR_id', '=', 'file_actions.File_Action_file_id')
                            ->where([ ['Doc_File_office_id', '=', $Temp_Current_office_id],
                                      ['Doc_File_department_id', '=', $Temp_Current_department_id],
                                      ['File_Action_end_date','<=',$TempCurrentDate]
                                    ])
                            ->join('office_entities', 'office_entities.Office_Entity_id', '=', 'file_actions.File_Action_emp_id')
                            ->join('office_desks', 'office_desks.Office_Desk_id', '=', 'office_entities.Office_Entity_desk_id')
                            ->get()->toArray();

              foreach($varFile_Action as $row)
              {
                $varUpdat_File_Action=FileAction::find($row->File_Action_id);

                $varUpdat_File_Action->File_Action_end_date=$TempNextDate;

                $varUpdat_File_Action->save();
              }

              return view('Admin_Send_Delay_Notification',compact('varFile_Action'));
      }








    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

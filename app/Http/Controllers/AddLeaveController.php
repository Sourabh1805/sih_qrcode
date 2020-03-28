<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DocFile;
use App\Initiator;
use App\Task;
use App\OfficeDepartment;
use App\OfficeEntity;
use App\FileAction;
use App\Office;
use App\OfficeDesk;
use Illuminate\Support\Facades\DB;

class AddLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin_Add_Leave');
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
      if(session('Current_User_type') == 'valueAdmin')
      {

        $Temp_Current_User_id=session('Current_User_id');
        $Temp_Current_office_id=session('Current_office_id');
        $Temp_Current_department_id=session('Current_department_id');

            if($request->get('Leave_to')=="ALL")
            {

               date_default_timezone_set('Asia/Kolkata');
               $now=strtotime("now");
               $TempCurrentDate= date("Y-m-d", $now);
               $d=strtotime("+1day",$now);
               $TempNextDate= date("Y-m-d",$d);


               $varDoc_File= DB::table('doc_files')
                                ->where([['Doc_File_office_id', '=', $Temp_Current_office_id],
                                 ['Doc_File_department_id', '=', $Temp_Current_department_id],
                                 ['Doc_File_status','!=',"COMPLETED"],
                                ])->get()->toArray();

                foreach ($varDoc_File as $row )
                {
                    $varFile_Action= DB::table('file_actions')
                                    ->where([['File_Action_file_id','=',$row->Doc_File_QR_id],
                                              ['File_Action_status','=',"ON GOING"]])->get()->toArray();

                    $varFile_Action=FileAction::find($varFile_Action[0]->File_Action_id);

                    $varFile_Action->File_Action_end_date=$TempNextDate;


                    echo "<script>alert('1 day leave is added to all the employee')</script>";

                    return redirect('employeedashboard');

                }



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

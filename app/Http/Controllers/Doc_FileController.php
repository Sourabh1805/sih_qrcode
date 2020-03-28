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
use App\OfficeDesk;





class Doc_FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //echo session('Current_User_type');
      //exit();
      /**/
      if(session('Current_User_type') == 'valueAdmin')
      {

        $Temp_Current_User_id=session('Current_User_id');
        $Temp_Current_office_id=session('Current_office_id');
        $Temp_Current_department_id=session('Current_department_id');

        /**/
          $users = DB::table('doc_files')
          ->where([         ['Doc_File_office_id', '=', $Temp_Current_office_id],
                            ['Doc_File_department_id', '=', $Temp_Current_department_id],
                ])

              ->join('tasks', 'tasks.task_id', '=', 'doc_files.Doc_File_task_id')
              ->join('initiators', 'initiators.initiator_id', '=', 'doc_files.Doc_File_initiator_id')
              ->get()->toArray();

              return view('Admin_Update_Doc_File',compact('users'));
      }

        return view('welcome');


    }

    public function myfiles()
    {
      if(session('Current_User_id'))
      {
      $Temp_Current_User_id=session('Current_User_id');
      $varDoc_File = DB::table('doc_files')->where([
                        ['Doc_File_initiator_id', '=', $Temp_Current_User_id],
            ])->get()->toArray();

      return view('Initiator_my_files',compact('varDoc_File'));
    }

    return view('InitiatorLogin');
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
        $vartask = Task::get()->toArray();
        $varInitiator = Initiator::get()->toArray();
        return view('Admin_Insert_Doc_File',compact('varInitiator','vartask'));
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


      $varOffice=Office::find($Temp_Current_office_id);
      $varOffice_Department=OfficeDepartment::find($Temp_Current_department_id);
      $varOffice_Initial=$varOffice['Office_initial'];
      $varOffice_Department_Initial = $varOffice_Department['Office_Department_initial'];

      $varDoc_Filetemp = DB::table('doc_files')
                 ->orderBy('Doc_File_id', 'desc')
                 ->get()->toArray();



      if(sizeof($varDoc_Filetemp)==0)
      {
        $fid=1;
      }
      else {
        $tempid=$varDoc_Filetemp[0]->Doc_File_id;

        $fid=$tempid+1;

      }
      $varkey= $varOffice_Initial."-".$varOffice_Department_Initial."-$fid";

      //echo session('Current_department_id');
      //exit();

      $CurrentTask = Task::find($request->get('Doc_File_task_id'));
      $CurrentTaskTimeRequired=$CurrentTask['Task_time_requried'];

      date_default_timezone_set('Asia/Kolkata');
      $now=strtotime("now");
      $TempCurrentDate= date("Y-m-d", $now);
      $d=strtotime("+1 day",$now);
      $TempNextDate= date("Y-m-d",$d);


      $Doc_File_end_date="+".$CurrentTaskTimeRequired."day";
      $Doc_File_end_date=strtotime($Doc_File_end_date,$now);
      $Doc_File_end_date= date("Y-m-d",$Doc_File_end_date);


      //echo $Doc_File_end_date;
      //echo $CurrentTaskTimeRequired;
      //exit();


     $varDoc_File= new DocFile([
       'Doc_File_QR_id'=>$varkey,
       'Doc_File_initiator_id'=> $request->get('Doc_File_initiator_id'),
       'Doc_File_title'=> $request->get('Doc_File_title'),
       'Doc_File_office_id'=>$Temp_Current_office_id ,
       'Doc_File_department_id'=>$Temp_Current_department_id,
       'Doc_File_subject'=> $request->get('Doc_File_subject'),
       'Doc_File_remark'=> $request->get('Doc_File_remark'),
       'Doc_File_end_date'=>$Doc_File_end_date,
       'Doc_File_start_date'=>$TempCurrentDate,
       'Doc_File_task_id'=> $request->get('Doc_File_task_id'),
       'Doc_File_priority'=> $request->get('Doc_File_priority'),
       'Doc_File_status'=> "On going",


    ]);


    //print_r($CurrentTask);
    //exit();
    $CurrentDeskList=json_decode($CurrentTask->Task_desk_list);    // list to array of elements
    //print_r($arr);
   //exit();


    //print_r($arr[0]);
    //exit();

    $TempDeskid=DB::table('office_entities')
                    ->where('Office_Entity_id','=',$Temp_Current_User_id)->get()->toArray();



  //  print_r($TempNextDate);
  //  exit();
    $varFile_Action= new FileAction([
    'File_Action_file_id'=> $varkey,
    'File_Action_desk_id'=>$TempDeskid[0]->Office_Entity_desk_id,
    'File_Action_emp_id'=> $Temp_Current_User_id,
    'File_Action_remark'=> "File Submitted",
    'File_Action_next_desk_id'=> $CurrentDeskList[0],
    'File_Action_no_of_warning'=> 0,
    'File_Action_Start_date' =>$TempCurrentDate,
    'File_Action_end_date' =>$TempCurrentDate,
    'File_Action_status'=> "COMPLETED",
        ]);

        $varFile_Action->save();
        echo "<script>alert('File action is inserted ...')</script>";


        $mobile = array();
        $tempEmpCount=1;




      //  print_r();
        //exit();

        foreach($CurrentDeskList as $r)
        {

          //$tempfun = OfficeEntity::find($r);
          $tempfun=DB::table('office_entities')
                          ->where('Office_Entity_desk_id', $r)->get()->toArray();
          //print_r($tempfun);
          //exit();
          array_push($mobile, "91".$tempfun[0]->Office_Entity_mobile_number);

          //print_r($mobile);
          //exit();
          if($tempEmpCount==count($CurrentDeskList))
          {





            $varFile_Action= new FileAction([
            'File_Action_file_id'=> $varkey,
            'File_Action_desk_id'=>$tempfun[0]->Office_Entity_desk_id,
            'File_Action_emp_id'=> $tempfun[0]->Office_Entity_id,


            'File_Action_no_of_warning'=> 0,
            'File_Action_status'=>"Waiting for file",
                ]);

                $varFile_Action->save();
          }
          elseif ($tempEmpCount==1 )
          {
            $varDesk=OfficeDesk::find($tempfun[0]->Office_Entity_desk_id);



            $CurrentTaskTimeRequired=$varDesk['Office_Desk_time_requried']+$CurrentTaskTimeRequired;

            $File_Action_end_date="+".$CurrentTaskTimeRequired."day";
            $File_Action_end_date=strtotime($File_Action_end_date,$now);
            $File_Action_end_date= date("Y-m-d",$File_Action_end_date);

            $varFile_Action= new FileAction([
            'File_Action_file_id'=> $varkey,
            'File_Action_desk_id'=>$tempfun[0]->Office_Entity_desk_id,
            'File_Action_emp_id'=> $tempfun[0]->Office_Entity_id,
            'File_Action_next_desk_id'=> $CurrentDeskList[$tempEmpCount],
            'File_Action_no_of_warning'=> 0,
            'File_Action_Start_date' =>$TempNextDate,
            'File_Action_end_date'=>$File_Action_end_date,
            'File_Action_status'=>"On going",
                ]);

                $varFile_Action->save();
          }

          else {



            $varFile_Action= new FileAction([
            'File_Action_file_id'=> $varkey,
            'File_Action_desk_id'=>$tempfun[0]->Office_Entity_desk_id,
            'File_Action_emp_id'=> $tempfun[0]->Office_Entity_id,
            'File_Action_next_desk_id'=> $CurrentDeskList[$tempEmpCount],


            'File_Action_no_of_warning'=> 0,
            'File_Action_status'=>"Waiting for file",
                ]);

                $varFile_Action->save();
          }

          $tempEmpCount=$tempEmpCount+1;


        }







    //msg to employeee having task

  $msg="new file added\nDetails".$request->get('Doc_File_title');
  $temp = Task::find($request->get('Doc_File_task_id'));
  //print_r($temp);
  //exit();
  //$arr=json_decode($temp->Task_desk_list);    // list to array of elements
  //print_r($arr);
  //exit();
//  $mobile = array();
//  foreach($arr as $r)
//  {
    //$tempfun = OfficeEntity::find($r);
  //  $tempfun=DB::table('office_entities')
                  //  ->where('Office_Entity_desk_id', $r)->get()->toArray();
    //print_r($tempfun);
    //exit();
  //  array_push($mobile, "91".$tempfun[0]->Office_Entity_mobile_number);

  //print_r($mobile);
    //exit();
//  }
  //print_r($mobile);
  //print_r($tempfun);
  //exit();
  $apiKey = urlencode('kxKxLHe524w-oGHlAhYHmVelwPWJuplUxqUd3D58Rl');

  /*$numbers = array($mobile[0]);
  $sender = urlencode('TEST');
  $message = rawurlencode($msg);
  */

//  $numbers = array(917030242705);
  $sender = urlencode('TXTLCL');
  $message = rawurlencode($msg);
  $numbers = implode(',', $mobile);
// Prepare data for POST request
  //print_r($numbers);
  //exit();
  $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
  $ch = curl_init('https://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

// Process your response here
  //echo $response;
  //exit();

   //return view('Admin_Update_Def_Message',compact('varDef_Message'));

  echo "<script>alert('Message sent to emp ...')</script>";
   // end of msg send to employeee







    // Start Of Initiator Message

   $msg1="Your File Process Started..\nDetails : ".$request->get('Doc_File_title');
   $temp1 = Task::find($request->get('Doc_File_task_id'));
//print_r();
//exit();
//$arr=json_decode($temp->Task_desk_list);
//print_r($arr);
//exit();
  $mobile1 = array();
  $r1=$request->get('Doc_File_initiator_id');
//foreach($arr as $r)
//{
  //$tempfun = OfficeEntity::find($r);
  $tempfun1=DB::table('initiators')
                  ->where('Initiator_id', $r1)->get()->toArray();
  //print_r($tempfun);
  //exit();
  array_push($mobile1, "91".$tempfun1[0]->Initiator_mobile_number);

// print_r($mobile);
  //exit();
//}
//print_r($mobile);
$apiKey = urlencode('kxKxLHe524w-oGHlAhYHmVelwPWJuplUxqUd3D58Rl');


/*$numbers = array($mobile[0]);
$sender = urlencode('TEST');
$message = rawurlencode($msg);

*/
//  $numbers = array(917030242705);
$sender = urlencode('TXTLCL');
$message1 = rawurlencode($msg1);
$numbers1 = implode(',', $mobile1);
// Prepare data for POST request
//print_r($numbers);
//exit();
$data = array('apikey' => $apiKey, 'numbers' => $numbers1, "sender" => $sender, "message" => $message1);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$response = curl_exec($ch);
//curl_close($ch);

// Process your response here
//echo $response;
//exit();

 //return view('Admin_Update_Def_Message',compact('varDef_Message'));

echo "<script>alert('Message sent to Initiator ...')</script>";

// End Of the Initiator Message




/*

//Email to employeee all

$temp = Task::find($request->get('Doc_File_task_id'));
//print_r();
//exit();
$arr=json_decode($temp->Task_desk_list);
//print_r($arr);
//exit();
$data=$request->get('Doc_File_title');
//print_r($data);
//exit();
//$r=1;
foreach($arr as $r)
{
//$tempfun = OfficeEntity::find($r);
$tempfun=DB::table('office_entities')
              ->where('Office_Entity_desk_id', $r)->get()->toArray();
//print_r($tempfun);
//exit();

$mail=$tempfun[0]->Office_Entity_email_id;
//print_r($mail);
$this->send($mail,$data);
//return back()->with('success', 'Thanks for contacting us!');
// print_r($mobile);
//exit();
}
//$numbers = implode(',', $mail);
//print_r($numbers);
//print_r($mail);
//exit();


// email to initiators

    $IniEmail=$request->get('Doc_File_initiator_id');
    $tempIniEmail=DB::table('initiators')
                  ->where('Initiator_id', $IniEmail)->get()->toArray();


    $mail=$tempIniEmail[0]->Initiator_email_id;
    $this->send($mail,$data);

*/

      $varDoc_File->save();
      echo "<script>alert('Data is inserted ...')</script>";

    session([
        "fid"=>$varkey
    ]);
    return redirect ('/qrcode');
  }
    return view('welcome');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Doc_File_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Doc_File_id)
    {
      if(session('Current_User_type') == 'valueAdmin')
      {
            $varDoc_File = DocFile::find($Doc_File_id);
            return view('Admin_View_Doc_File',compact('varDoc_File','Doc_File_id'));
      }
        return view('welcome');


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
          if(session('Current_User_type') == 'valueAdmin')
              {
                  $varDoc_File=  DocFile::find($id);

                  $varDoc_File->Doc_File_title= $request->get('Doc_File_title');

                  $varDoc_File->Doc_File_subject= $request->get('Doc_File_subject');
                  $varDoc_File->Doc_File_remark= $request->get('Doc_File_remark');
                  $varDoc_File->Doc_File_start_date= $request->get('Doc_File_start_date');

                  $varDoc_File->Doc_File_end_date= $request->get('Doc_File_end_date');
                  $varDoc_File->Doc_File_priority= $request->get('Doc_File_priority');
                  $varDoc_File->Doc_File_status= $request->get('Doc_File_status');

                  $varDoc_File->save();
                  return redirect ('/doc_file');
              }
          return view('welcome');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Doc_File_id)
    {
      if(session('Current_User_type') == 'valueAdmin')
      {

      $varDoc_File = DocFile::find($Doc_File_id);
      $varDoc_File->delete();
      echo"<script>alert('Deleted')</script>";
      $varDoc_File=DocFile::get()->toArray();
      return view('Admin_Update_Doc_File',compact('varDoc_File'));
    }
      return view('welcome');


    }

    public function send($mail,$data)
    {

    $this->$mail=$mail;
      Mail::to("$mail")->send(new sendemail($data));
      return back()->with('success', 'Thanks for contacting us!');
    }
}

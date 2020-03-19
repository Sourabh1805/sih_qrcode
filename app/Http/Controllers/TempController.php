<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\FileAction;
use App\Initiator;
Use App\DocFile;



class TempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  /*    // message to Initiator for update
    $msg="Your File is proceed to next table\nDetails : ";
    $DocFile = DocFile::find(1);
   //print_r($temp1);
   //exit();


   $Initiator_id=$DocFile->Doc_File_initiator_id;

   $varInitiator=DB::table('initiators')
                   ->where('id', $Initiator_id)->get()->toArray();
   //print_r($varInitiator);
   //exit();
   $varInitiator_mobile="91".$varInitiator[0]->Initiator_mobile_number;

   //print_r($varInitiator_mobile);
   //exit();
   //}

   $apiKey = urlencode('HgWGA18axPw-jKqCkvxoazGxaOoGYCdw9GtZiVuZvs');


   $sender = urlencode('TXTLCL');
   $message = rawurlencode($msg);
   //$message1 = rawurlencode($msg1);

   // Prepare data for POST request
   //print_r($numbers);
   //exit();
   $data = array('apikey' => $apiKey, 'numbers' => $varInitiator_mobile, "sender" => $sender, "message" => $message);

   // Send the POST request with cURL
   $ch = curl_init('https://api.textlocal.in/send/');
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);

   // Process your response here
   echo $response;
   //exit();

   //return view('Admin_Update_Def_Message',compact('varDef_Message'));

   echo "<script>alert('Message sent to Initiator ...')</script>"; */









   // message to next employee for update
   $MsgEmp="Your File Process Started..\nDetails : ";
   $DocFile = DocFile::find(1);
  //print_r($temp1);
  //exit();
  $mobile = array();
  $Initiator_id=$DocFile->Doc_File_initiator_id;

  $varInitiator=DB::table('initiators')
                  ->where('id', $Initiator_id)->get()->toArray();
  //print_r($varInitiator);
  //exit();
  $varInitiator_mobile="91".$varInitiator[0]->Initiator_mobile_number;

  //print_r($varInitiator_mobile);
  //exit();
  //}

  $apiKey = urlencode('HgWGA18axPw-jKqCkvxoazGxaOoGYCdw9GtZiVuZvs');


  $sender = urlencode('TXTLCL');
  $message = rawurlencode($msg);
  //$message1 = rawurlencode($msg1);

  // Prepare data for POST request
  //print_r($numbers);
  //exit();
  $data = array('apikey' => $apiKey, 'numbers' => $varInitiator_mobile, "sender" => $sender, "message" => $message);

  // Send the POST request with cURL
  $ch = curl_init('https://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

  // Process your response here
  echo $response;
  //exit();

  //return view('Admin_Update_Def_Message',compact('varDef_Message'));

  echo "<script>alert('Message sent to Initiator ...')</script>";




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

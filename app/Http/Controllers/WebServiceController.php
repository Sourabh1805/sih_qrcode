<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocFile;

class WebServiceController extends Controller
{
    public function getFiles()
    {
      $data = DocFile::get()->toArray();
      //print_r($data);
      echo json_encode($data);
      exit();
    }
    public function updateStatus(Request $request)
    {
      print_r($request);
      //$data = array();
      //echo $request->get('unm');
      //exit();
      //$data[0]=$request->get('unm');
      //$data[1]=$request->get('ps');
      //$res = array();
      //array_push($res,$data);
      //echo json_encode($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileBunch;

class File_BunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $varFileBunch=FileBunch::get()->toArray();
      return view('Admin_Update_FileBunch',compact('varFileBunch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin_Insert_FileBunch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(!session('Current_User_type') == 'Admin')
      {
        return view('welcome');
      }
      $Temp_Current_User_id=session('Current_User_id');
      $Temp_Current_office_id=session('Current_office_id');
      $Temp_Current_department_id=session('Current_department_id');


      $varFileBunch= new FileBunch([
      'File_Bunch_office_id'=> $Temp_Current_office_id,
      'File_Bunch_department_id'=> $Temp_Current_department_id,
      'File_Bunch_title'=> $request->get('File_Bunch_title'),
      'File_Bunch_year'=> $request->get('File_Bunch_year'),
      ]);
      $varFileBunch->save();
      echo "<script>alert('Data is inserted ...')</script>";
      return view('Admin_Insert_FileBunch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($File_Bunch_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($File_Bunch_id)
    {
      $varFileBunch=FileBunch::find($File_Bunch_id);
      return view('Admin_View_FileBunch',compact('varFileBunch','File_Bunch_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $File_Bunch_id)
    {
      $varFileBunch=  FileBunch::find($File_Bunch_id);
      $varFileBunch->File_Bunch_office_id= $request->get('File_Bunch_office_id');
      $varFileBunch->File_Bunch_dept_id= $request->get('File_Bunch_dept_id');
      $varFileBunch->File_Bunch_title= $request->get('File_Bunch_title');
      $varFileBunch->File_Bunch_year= $request->get('File_Bunch_year');

      $varFileBunch->save();
      return redirect ('/bunch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($File_Bunch_id)
    {
      $varFileBunch = FileBunch::find($File_Bunch_id);
      $varFileBunch->delete();
      echo"<script>alert('Deleted')</script>";
      $varFileBunch=FileBunch::get()->toArray();
      return view('Admin_Update_FileBunch',compact('varFileBunch'));

    }
}

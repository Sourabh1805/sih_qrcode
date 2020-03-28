<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocFile;
use App\FileAction;
use App\OfficeDesk;
use App\OfficeRack;
use App\FileBunch;
use Illuminate\Support\Facades\DB;

class StoreFileController extends Controller
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
            return view ('Admin_Search_Store_file');
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

       if(session('Current_User_type') == 'valueAdmin')
       {
                   $Temp_Current_User_id=session('Current_User_id');
                   $Temp_Current_office_id=session('Current_office_id');
                   $Temp_Current_department_id=session('Current_department_id');

                   $varDoc_File = DB::table('doc_files')
                                   ->where([['Doc_File_QR_id', '=', $request->get('File_Action_file_id')],
                                            ['Doc_File_office_id', '=', $Temp_Current_office_id],
                                            ['Doc_file_department_id', '=', $Temp_Current_department_id]
                                           ])->get()->toArray();

                 if(sizeof($varDoc_File)==0)
                 {
                         echo "<script>alert('File Does not belong to you or enter valid file id')</script>";
                         return view('Admin_Search_Store_file');
                 }
                 else
                 {
                      $varDoc_File=DocFile::find($varDoc_File[0]->Doc_File_QR_id);
                      $varOfficeRack=OfficeRack::get()->toArray();
                      $varFileBunch = FileBunch::get()->toArray();
                      return view('Admin_Store_file',compact('$varDoc_File','$varOfficeRack','$varFileBunch'));
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
     public function update(Request $request)
     {


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

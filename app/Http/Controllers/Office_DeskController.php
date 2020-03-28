<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\OfficeDesk;
use App\OfficeDepartment;


class Office_DeskController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!session('Current_User_type') == 'valueAdmin')
      {
        return view('welcome');
      }
      $varOffice_Desk = OfficeDesk ::get()->toArray();
      return view('Admin_Update_Office_Desk',compact('varOffice_Desk','varOffice_Department'));
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
          return view('Admin_Insert_Office_Desk');
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

            $varOffice_Desk= new OfficeDesk([
            'Office_Desk_office_id'=>$Temp_Current_office_id,
            'Office_Desk_department_id'=>$Temp_Current_department_id,
            'Office_Desk_departmet'=> $request->get('Office_Desk_departmet'),
            'Office_Desk_title'=> $request->get('Office_Desk_title'),
            'Office_Desk_time_requried'=> $request->get('Office_Desk_time_requried'),
                  ]);
            $varOffice_Desk->save();
            echo "<script>alert('Data is inserted ...')</script>";
            $varOffice_Department=OfficeDepartment::get()->toArray();

            return view('Admin_Insert_Office_Desk',compact('varOffice_Department'));
          }
            return view('welcome');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Office_Desk_id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Office_Desk_id)
    {
      if(session('Current_User_type') == 'valueAdmin')
      {
          $varOffice_Desk=OfficeDesk::find($Office_Desk_id);
          return view('Admin_View_Office_Desk',compact('varOffice_Desk','Office_Desk_id'));
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
    public function update(Request $request, $Office_Desk_id)
    {
      if(session('Current_User_type') == 'valueAdmin')
      {
          $varOffice_Desk=  OfficeDesk::find($Office_Desk_id);
          $varOffice_Desk->Office_Desk_title= $request->get('Office_Desk_title');
          $varOffice_Desk->Office_Desk_time_requried= $request->get('Office_Desk_time_requried');
          $varOffice_Desk->Office_Desk_status= $request->get('Office_Desk_status');
          $varOffice_Desk->save();
          return redirect ('/office_desk');
      }
          return view('welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Office_Desk_id)
    {
      if(session('Current_User_type') == 'valueAdmin')
      {
          $varOffice_Desk = OfficeDesk::find($Office_Desk_id);
          $varOffice_Desk->delete();
          echo"<script>alert('Deleted')</script>";
          $varOffice_Desk=OfficeDesk::get()->toArray();
          return view('Admin_Update_Office_Desk',compact('varOffice_Desk'));
      }
          return view('welcome');
    }
}

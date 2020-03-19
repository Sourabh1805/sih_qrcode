<?php

namespace App\Http\Controllers;
use App\OfficeEntity;

use App\Initiator;



use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo session('Current_User_id');
        //return view('authdemo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //exit();
      //$Current_User_id=session("Current_User_id");
      return view('authdemo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
      //print_r($request);
      //echo "Stored";
      //return view('welcome');
      //exit();

      $unm=$request->get('Current_UserName');

      session(["Current_User_id"=>$Current_UserName]);
      echo "session set";

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
    public function destroy()
    {

    }

    public function LogOut()
  {
    $utype = session('Current_User_type');

    session(['Current_User_id'=>NULL]);
    session(['Current_office_id'=>NULL]);
    session(['Current_department_id'=>NULL]);
    session(['Current_User_type'=>NULL]);
    if ($utype=="valueInitiator") {
      return redirect('/login');
    }
      return redirect('/');
  }

    public function LoginAdmin(Request $request)
    {


      $un = $request->get('Current_UserName');
      $ps = $request->get('Current_Password');



      if ($un=="superadmin" and $ps=="superadmin")
      {
        session(['Current_User_type'=>"SUPERADMIN"]);
        return view('Sadmin_Dashboard');

      }


      if($utype = $request->get('utype'))
      {
          if($utype=="valueAdmin")
        {
          $varOffice_Entity = OfficeEntity::select('*')->where('Office_Entity_mobile_number','=',$un)->where('Office_Entity_password','=',$ps)->where('Office_Entity_type','=',"Admin")->get();
          $cnt = $varOffice_Entity->count();


          if($cnt>0)
          {
            foreach($varOffice_Entity as $c)
            {
              session(['Current_User_id'=>$c->Office_Entity_id]);
              session(['Current_office_id'=>$c->Office_Entity_office_id]);
              session(['Current_department_id'=>$c->Office_Entity_department_id]);
              session(['Current_User_type'=>$utype]);
            }
            return redirect('dashboard');
          }
          else {
            echo "<script>alert('Something went wrong, Please check your details')</script>";
            return redirect('/');
                }
          }


          if($utype=="valueInitiator")
        {
          $varInitiator = Initiator::select('*')->where('Initiator_mobile_number','=',$un)->where('Initiator_password','=',$ps)->get();
          $cnt = $varInitiator->count();
          if($cnt>0)
          {
            foreach($varInitiator as $c)
            {
              session(['Current_User_id'=>$c->Initiator_id]);
              session(['Current_User_type'=>$utype]);

            }
            return redirect('/home');
          }
          else {
            echo "<script>alert('Something went wrong, Please check your details')</script>";
            return redirect('/login');
                }
          }


          if($utype=="valueEmployee")
          {
          $varOffice_Entity = OfficeEntity::select('*')->where('Office_Entity_mobile_number','=',$un)->where('Office_Entity_password','=',$ps)->where('Office_Entity_type','=',"Employee")->get();
          $cnt = $varOffice_Entity->count();
          if($cnt>0)
          {
            foreach($varOffice_Entity as $c)
            {
              session(['Current_User_id'=>$c->Office_Entity_id]);
              session(['Current_office_id'=>$c->Office_Entity_office_id]);
              session(['Current_department_id'=>$c->Office_Entity_department_id]);
              session(['Current_User_type'=>$utype]);
            }
            return redirect('employeedashboard');
          }
          else {
            echo "<script>alert('Something went wrong, Please check your details')</script>";
            return redirect('/');
                }
          }

        }
    }
}


/*
      if($utype = $request->get('utype'))
      {
          if($utype=="valueEmployee")
        {
          $varOffice_Entity = OfficeEntity::select('*')->where('Office_Entity_mobile_number','=',$un)->where('Office_Entity_password','=',$ps)->get();
          $cnt = $varOffice_Entity->count();
          if($cnt>0)
          {
            foreach($varOffice_Entity as $c)
            {
              session(['Current_User_id'=>$c->id]);
            }
            return redirect('employee');
          }
          else {
            echo "<script>alert('Wron inputs')</script>";
            return redirect('/');
          }
      }


      if($utype=="valueAdmin")
    {

      $varOffice_Entity = OfficeEntity::select('*')->where('Office_Entity_mobile_number','=',$un)->where('Office_Entity_password','=',$ps)->get();
      $cnt = $varOffice_Entity->count();
      if($cnt>0)
      {
        foreach($varOffice_Entity as $c)
        {
          session(['Current_User_id'=>$c->id]);
        }

        return redirect('admin');
      }
      else {
        echo "<script>alert('Wron inputs')</script>";
        return redirect('/');
      }
  }


  if($utype=="ValueInitiator")
{

  $varInitiator = Initiator::select('*')->where('Initiator_mobile_number','=',$un)->where('Initiator_password','=',$ps)->get();
  $cnt = $varInitiator->count();
  if($cnt>0)
  {
    foreach($varInitiator as $c)
    {
      session(['Current_User_id'=>$c->id]);

    }

    return redirect('initiator');
  }
  else {
    echo "<script>alert('Wron inputs')</script>";
    return redirect('initiator');
  }
}
}

    }
*/

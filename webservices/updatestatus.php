<?php

$con = mysqli_connect("localhost","root","","sih_qrcode");

$emp_id=$_POST['id'];
$desk_id=$_POST['Employee_desk_id'];
$fid=$_POST['fid'];
$File_status=$_POST['File_Action_status'];
$File_remark=$_POST['File_Action_remark'];
$File_next_desk = $_POST['File_Action_next_desk_id'];
$sql_FileAction = "select * from file_actions where File_Action_file_id='$fid' and File_Action_desk_id= '$desk_id'";


date_default_timezone_set('Asia/Kolkata');
$d=strtotime("now");
$TempCurrentDate= date("Y-m-d",$d);
$d=strtotime("+1 day",$d);
$TempNextDate= date("Y-m-d", $d);

if(mysqli_query($con,$sql_FileAction))
{
  $rs_FileAction = mysqli_query($con,$sql_FileAction);
  $rw_FileAction = mysqli_fetch_row($rs_FileAction);

  //update current file status
  if($File_status="Completed")
  {
      $sql_UpdateStatus = "UPDATE file_actions SET File_Action_remark='$File_remark', File_Action_end_date='$TempCurrentDate', File_Action_status= '$File_status' where File_Action_id='$rw_FileAction[0]'";
      if(mysqli_query($con,$sql_UpdateStatus))
      {
        $nextdeskid=$rw_FileAction[7];
        if($nextdeskid)
        {
            $sql_NextDeskAction = "select * from file_actions where File_Action_file_id='$fid' and File_Action_desk_id='$nextdeskid'";
            $rs_NextDeskAction = mysqli_query($con,$sql_NextDeskAction);

            $rw_NextDeskAction = mysqli_fetch_row($rs_NextDeskAction);
            $sql_UpdateStatusNextDesk = "UPDATE file_actions SET  File_Action_start_date='$TempNextDate', File_Action_status='On going'  where File_Action_id='$rw_NextDeskAction[0]'";
            mysqli_query($con,$sql_UpdateStatusNextDesk);
            echo "next desk updated ";
        }
        else {
          // doc file status Complete

        }
      }
  }
  else {
// pending file action status
    $sql_UpdateStatus = "UPDATE file_actions SET File_Action_remark='$File_remark', File_Action_status= '$File_status' where File_Action_id='$rw_NextDeskAction[0]'";
    echo " Pending";
  }

}


/*
//$sql = "INSERT INTO `file_actions`(`File_Action_file_id`, `File_Action_desk_id`, `File_Action_emp_id`, `File_Action_remark`,  `File_Action_next_desk_id`, `File_Action_status`) VALUES ('$fid','$desk_id','$emp_id','$File_remark','$File_next_desk','$File_status')";
$rs = mysqli_query($con,$sql);
echo mysqli_error($con);
$rw = mysqli_fetch_row($rs);
$nextdeskid=$rw[7];

  if ($File_status=="Completed")
  {
      $updatestatus = "UPDATE file_actions SET File_Action_remark='$File_remark', File_Action_end_date='$TempCurrentDate', File_Action_status= '$File_status' where File_Action_id='$rw[0]'";


    if (mysqli_query($con,$updatestatus))
    {

      echo "desk updated ";
      $sql_nextdeskaction = "select * from file_actions where File_Action_file_id='$fid' and File_Action_desk_id='$nextdeskid'";
      if(mysqli_query($con,$sql_nextdeskaction))
      {
        $rs = mysqli_query($con,$sql_nextdeskaction);
        $rw = mysqli_fetch_row($rs);
        $UpdateStatusNextDesk = "UPDATE file_actions SET  File_Action_start_date='$TempNextDate', File_Action_status='On going'  where File_Action_id='$rw[0]'";
        mysqli_query($con,$UpdateStatusNextDesk)
        echo "next desk updated ";
      }
      else {
        echo "last desk ";

      }

    }
    else {
      echo mysqli_error($con);
    }





}



































//update tablename set column=value,....where pk=value

  if(mysqli_query($con,$sql)){
    echo "success";


    $sql2 = "select * from doc_files where Doc_File_id='".$fid."'";
    $rs = mysqli_query($con,$sql2);
    $rw = mysqli_fetch_row($rs);

    $iniID=$rw[2];
    $Doc_Title=$rw[3];

    $sql3 = "select * from initiators where id=$iniID";
    $rs3 = mysqli_query($con,$sql3);
    $rw3 = mysqli_fetch_row($rs3);

    $mobilenum="91".$rw3[1];
    $msg1="Your remark for file ".$Doc_Title." is\n".$File_remark."\nplease check the details";



    $apiKey = urlencode('kxKxLHe524w-oGHlAhYHmVelwPWJuplUxqUd3D58Rl');



    $sender = urlencode('TXTLCL');
    $message1 = rawurlencode($msg1);
    $numbers1 = implode(',', $mobile1);

    $data = array('apikey' => $apiKey, 'numbers' => $mobilenum, "sender" => $sender, "message" => $message1);


    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
    //


    //exit();
  }
  else{
    echo mysqli_error($con);
  }*/
?>

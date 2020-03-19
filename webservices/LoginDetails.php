<?php
  $con = mysqli_connect("localhost","root","","sih_qrcode");
  $uname=$_POST['username'];
  $pass=$_POST['password'];
  $sql = "select * from office_entities where Office_Entity_mobile_number='$uname' and Office_Entity_password= '$pass'";
  $rs = mysqli_query($con,$sql);
  echo mysqli_error($con);

  $rw = mysqli_fetch_row($rs);

  $data['id']=$rw[0];
  $data['Employee_desk_id']=$rw[7];
  $data['Employee_departmet']=$rw[8];
  $resp=array();
  array_push($resp,$data);
  echo json_encode($resp);
?>

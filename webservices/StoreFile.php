

<?php
  $con = mysqli_connect("localhost","root","","sih_qrcode");
  $fid=$_POST['Office'];
  $fid=$_POST['Department'];

  $sql = "select * from racks where Office_Rack_office_id=$Office";

  $rs = mysqli_query($con,$sql);
  $rw = mysqli_fetch_row($rs);

  $data['id']=$rw[1];
  $data['fname']=$rw[3];
  $resp=array();
  array_push($resp,$data);
  echo json_encode($resp);
?>

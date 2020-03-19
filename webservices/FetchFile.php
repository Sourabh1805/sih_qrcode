

<?php
  $con = mysqli_connect("localhost","root","","sih_qrcode");
  $fid=$_POST['fid'];
  $sql = "select * from doc_files where Doc_File_QR_id='".$fid."'";
  $rs = mysqli_query($con,$sql);
  $rw = mysqli_fetch_row($rs);

  $data['id']=$rw[1];
  $data['fname']=$rw[3];
  $resp=array();
  array_push($resp,$data);
  echo json_encode($resp);
?>

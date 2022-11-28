<?php
session_start();
include 'partials/_dbconnect.php';

 $username = $_REQUEST["username"];
  $parentName = $_REQUEST["parentName"];
  $address =addslashes($_REQUEST["address"]);
 $email = $_REQUEST["email"];
  $gender = $_REQUEST["gender"];
  $religion = $_REQUEST["rele"];
 $gender = $_REQUEST["gender"];
 $student_id=$_REQUEST['stu_id'];


 echo $upd_sql="UPDATE `info2` SET `userName` = '$username',  `parentName` = '$parentName', `address` = '$address',  `email` = '$email', `gender` = '$gender', `rel_id` = '$religion' WHERE `info2`.`stu_id` = ".$student_id;


$resl=mysqli_query($conn,$upd_sql);

$del_qry="delete from facility_info2 where stu_id=".$student_id;
$res2=mysqli_query($conn,$del_qry);
  
$facility_array= $_REQUEST['facility'];
foreach ($facility_array as $facility_id){
  $facility_sql="INSERT INTO facility_info2 VALUES('','$facility_id','$student_id')";
  mysqli_query($conn,$facility_sql);
}



//$fac_sql = "INSERT INTO `facility_info2` (`linkid`, `fid`, `stu_id`) VALUES (NULL, '', '$student_id')";

//$resq= mysqli_query($conn,$fac_sql);

header("location: welcome.php");

?>



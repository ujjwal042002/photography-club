<?php
include 'partials/_dbconnect.php';
error_reporting(0);
$stu_id = $_GET['id'];

$query = "DELETE FROM info2 WHERE stu_id='$stu_id'";

$data = mysqli_query($conn,$query);
if($data)
{
//echo "<script>alert ('record deleted from database')</script>";
?>
<META HTTP-EQUIV="refresh" CONTENT="0;   URL= http://localhost/temp/welcome.php">
<?php

}

else
{
echo "<font color = 'red'> failed to delete record from database";

}

?>
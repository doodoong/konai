<?php
session_start();
include_once ('../config.php');

$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
extract($_POST);

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");

$sql = "select authority from Account where id = '$ID' and password = '$PASS'" ;
//$sql = "select * from Account" ; 
$result = mysql_query($sql) or die("SQL ERROR");

$num = mysql_num_rows($result); 

if( $num == 1 )
{
  $authority = mysql_result($result, 0 , "authority"); 
   
  if( strcmp( 'ADMIN', $authority ) &&  strcmp( 'MEMBER' , $authority ) )
  {
  mysql_close($conn);
 echo "<script>alert(\"Your Account is not Approver Yet.\") ; history.back(-1);</script>";
  exit();
  }
 else 
{
  $_SESSION['is_logged'] = 'YES'; 
  $_SESSION['authority'] = $authority ; 
  $_SESSION['user_id'] = $ID;
  mysql_close($conn);
 header("Location: ../menu.php");
  exit();
 }
}
else
{
 echo "<script>alert(\"check ID and PASSWORD.\"); history.back(-1);</script>";
 mysql_close($conn);
   exit();
}


?>




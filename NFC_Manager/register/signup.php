<?php

include_once ('../config.php');

$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
extract($_POST);

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR"); 
  $user1 = ereg_replace(" ", "", $user_id);
  $user2 = ereg_replace(" ", "", $user_pass1);
  $user3 = ereg_replace(" ", "", $user_pass2);

if( !$user1 || !$user2 || !$user3   ) 
{
	//header("Location: ./make_account.html");
	echo "<script>alert(\"check the form.\"); history.back(-1);</script>";
	exit();

}

$sql = "insert into Account values ('$user_id' , '$user_pass1', 'READY' )";

mysql_query($sql) or die("SQL ERROR");

$sql = "insert into User_info values('$user_id', '$user_name' , '$user_phone' , '$user_email' , '$sex' )";

mysql_query($sql) or die("SQL ERROR");

mysql_close($conn);



header("Location: ./signup_done.php");


exit(); 

?> 

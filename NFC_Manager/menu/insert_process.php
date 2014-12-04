<?php

include_once ('../config.php');

$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
extract($_POST);

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");
$user1 = ereg_replace(" ", "", $process_name);
$user2 = ereg_replace(" ", "", $process_contents);
$user3 = ereg_replace(" ", "", $process_key);

if( !$user1 || !$user2 || !$user3   )
{
	//header("Location: ./make_account.html");
	echo "<script>alert(\"check the form.\"); history.back(-1);</script>";
	exit();

}
$id = 0;	

for( $id = 1 ; $id <= 200; $id ++ )
{
	$sql = "select * from Process where p_id = $id";
	$result = mysql_query($sql) or die("SQL ERROR1");
	$num = mysql_num_rows($result) ;
	if($num == 0 ){ break;}
}

if( $id ==  201) 
{
	echo "<script>alert(\"NO MORE SPACE. DELETE \"); history.back(-1);</script>";
	mysql_close($conn);
	exit();
}
else
{
	$sql = "insert into Process values ($id , '$process_name', $process_key, '$process_contents', null)";

	$result = mysql_query($sql) or die(mysql_error());
	
	mysql_close($conn);

	header("Location: process_management.php");

	exit();
}
?>


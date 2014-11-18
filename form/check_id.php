<?php


header("Content-Type: text/plain; charset=euc-kr");
include_once ('../config.php');
$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");

$id = $_REQUEST['id'];  
//echo $id;
$sql = "select * from Account where id ='$id'";


$result = mysql_query($sql) or die("SQL ERROR");

$num = mysql_num_rows($result);

if(  $num < 1 ) echo("ok") ; 
else echo("no") ;

?>


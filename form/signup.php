<?php
include_once ('../config.php');
$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
extract($_POST);

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR"); 

$result = $sql = "select * from Account where id = '$user_id'";
echo $result;

//mysql_query($sql) or die("SQL ERROR");
echo $sex, '<br />';
echo $user_id. '<br />';
echo $user_pass1. '<br />';
echo $user_pass2. '<br />';
echo $user_email. '<br />';

mysql_close($conn);
?> 

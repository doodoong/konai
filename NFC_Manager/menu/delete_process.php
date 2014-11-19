<?php

include_once ('../config.php');

$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
extract($_POST);

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");
	
  $user1 = ereg_replace(" ", "", $process_name);

        if( !$user1  )
        {
        //header("Location: ./make_account.html");
          echo "<script>alert(\"check the form.\"); history.back(-1);</script>";
         exit();

        }

$sql = "select * from Process where p_name ='$process_name'";

$result = mysql_query($sql) or die("SQL ERROR");

$num = mysql_num_rows($result);


if($num == 0 ){

  echo "<script>alert(\"NO SUCH PROCESS \"); history.back(-1);</script>";
 mysql_close($conn);
 exit();

}
else
{

$sql = "delete from Process where p_name ='$process_name'";
$result = mysql_query($sql) or die("SQL ERROR");
mysql_close($conn);
  header("Location: process_management.php");

        exit();
}
?>



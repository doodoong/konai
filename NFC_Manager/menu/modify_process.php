<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="../css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<style type="text/css">

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

#left-square {
    margin-left : 10%;
    width: 45%;
    height: 500px;
    float : left;	
    overflow: auto;
}
#right-square {
    margin-right : 10%;
    width: 30%;
    height: 500px;
    float : right;
    overflow: auto;
}

</style>
</head>
    <BODY>
        <h1 class="menu-title" >PROCESS MODIFY</h1>
        <div id = "left-square" class="about">
	<div class="result">
 	<h2 class="contents-title"> PROCESS LIST </h2>
	<table style="width:100%; font-size:15px">
	<tr>
	<th>Process</th>
	<th>Description</th>
	<th>Key</th>
	<tr>
	  <?php
        include_once ('../config.php');
	//	extract($_POST);
        $conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
        mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");
        $sql = "select * from Process where p_name='$_POST[process_name]' order by p_id desc";
        $result = mysql_query($sql) or die(mysql_error());
        $num = mysql_num_rows($result);
    
        if (mysql_num_rows($result) > 0)
        {
                while($row = mysql_fetch_array($result)){

                echo '<tr> <th>'.$row["p_name"].'</th> <th>'.$row["p_detail"].'</th><th>'.$row["p_key"].'</th></tr>';
                }
        }else {

            echo '<p class="contents-input"> No process </p>';
        }
        mysql_close($conn);
        ?>
	
	</table>
	</div>
	</div>
       <div id = "right-square" class="about">
<!--	 <form name ="insert_form" class="contents" method="post" action="insert_process.php">
	<h2 class="contents-title"> INSERT PROCESS </h2>	
	<input type="text" name ="process_name" class="contents-input" placeholder="Process Name">
 	 <input type="text" name ="process_contents" class="contents-input" placeholder="Process Contents(0~100)">
 	 <input type="text" name ="process_key" class="contents-input" placeholder="Process key">
	 <input type="submit" name value="Insert" class="register-button">  onclick="check_id('check_id.php')">
 </form> -->

	<form name ="delete_form" class="contents" method="post" action="modify_process.php">
        <h2 class="contents-title">  PROCESS </h2>
        <input type="text" name ="process_name" class="contents-input" placeholder="Process Name">
        <input type="submit" name value="Modify" class="register-button" >
	
	</form>
	</div>
 </BODY>
</HTML>


<?php

include_once ('../config.php');

$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");

mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");

$user1 = ereg_replace(" ", "", $_POST[process_name]);

if( !$user1  )
{
	//header("Location: ./make_account.html");
	echo "<script>alert(\"check the form.\"); history.back(-1);</script>";
	exit();

}

$sql = "select * from Process where p_name ='$_POST[process_name]'";

$result = mysql_query($sql) or die("SQL ERROR");

$num = mysql_num_rows($result);


if($num == 0 ){

	echo "<script>alert(\"NO SUCH PROCESS \"); history.back(-1);</script>";
	mysql_close($conn);
	exit();

}
else
{
/*
	$sql = "delete from Process where p_name ='$process_name'";
	$result = mysql_query($sql) or die("SQL ERROR");
*/
	
	mysql_close($conn);
	header("Location: process_management.php");

	exit();
}
?>

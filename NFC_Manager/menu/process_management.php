<?php
/*
session_start();
$is_logged = $_SESSION['is_logged'];
if($is_logged=='YES') {
	$user_id = $_SESSION['user_id'];
	$message = $user_id . ' 님, 로그인 했습니다.';
	$authority = $_SESSION['authority'];

}
else {
	echo "<script>alert(\"check ID and PASSWORD.\"); history.back(-1);</script>";
}
//var_dump($_SESSION);
 */
?>


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
        <h1 class="menu-title" >PROCESS MANAGEMENT</h1>
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
        $conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
        mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");
        $sql = "select * from Process order by p_id desc";
        $result = mysql_query($sql) or die("SQL ERROR");
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
	 <form name ="insert_form" class="contents" method="post" action="insert_process.php">
	<h2 class="contents-title"> INSERT PROCESS </h2>	
	<input type="text" name ="process_name" class="contents-input" placeholder="Process Name">
 	 <input type="text" name ="process_contents" class="contents-input" placeholder="Process Contents(0~100)">
 	 <input type="text" name ="process_key" class="contents-input" placeholder="Process key">
	 <input type="submit" name value="Insert" class="register-button"><!--  onclick="check_id('check_id.php')">-->
	</form>

	<form name ="modify_form" class="contents" method="post" action="modify_process.php">
        <h2 class="contents-title"> MODIFY PROCESS </h2>
        <input type="text" name ="process_name" class="contents-input" placeholder="Process Name">
        <input type="submit" name value="Modify" class="register-button" >
	
	</form>
	</div>
 </BODY>
</HTML>



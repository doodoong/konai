<?php
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
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
    <BODY>
 	<h1 class="register-title" > NFC MANAGEMENT</h1>
  	<div class = "about"> 
	<p class = "menu-links"><a href="menu/process_management.php">PROCESS<a></p>
	<p class = "menu-links"><a href="menu/menu2.php">TASK</a></p>
	<p class = "menu-links"><a href="menu/item_finder.php">ITEM</a></p>
	</div>
	<div class = "about"> 
	<p class = "menu-links"><a href="login/logout.php">LOGOUT</a></p>
	</div>
 </BODY>


</HTML> 


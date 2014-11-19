<?php

session_start();

//echo 'Welcome to page #1';

$_SESSION['is_logged'] = 'NO';
//$_SESSION['animal']   = 'cat';
//$_SESSION['time']     = time();
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
<body>
 <h1 class="register-title">NFC MANAGER</h1>
  <form class="register" method="post" action="login/check_login.php">
    <input type="text" name="ID" class="register-input" placeholder="ID">
    <input type="password" name="PASS" class="register-input" placeholder="Password">
    <input type="submit" value="LOGIN" class="register-button">
    </form>  
    <div class = "about">
        <p><font size = 3px> Do you have a account? </font> </p>
	<p><font size = 2px> OR </font></p>
	<p class = "menu-links">
	<a href="register/make_account.php">REGISTER</a>
	</p>
    </div>
</body>
</html>



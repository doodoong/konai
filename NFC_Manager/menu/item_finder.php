<?php
/*session_start();
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
        <h1 class="menu-title" >Item Information</h1>
        
        
        <div id = "left-square" class="about">
    	<div class="result">
     	<h2 class="contents-title"> Item </h2>
    	<table style="width:100%; font-size:15px">
    	<tr>
    	<th>Item</th>
    	<th>Item Number</th></th>
    	<th>Lot Number</th>
    	<th>Process Order</th>
    	<th>Status</th>
    	</tr>
    	
    	  <?php
		  include_once ('../config.php');
            $conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
            mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");
			
			if (empty ($_GET[keyword])) {
				$sql = "select * from Item order by item_id desc";
			} elseif ($_GET[type] === 'name') {
				$sql = "select * from Item where item_name='$_GET[keyword]' order by item_id desc";
			} elseif ($_GET[type] === 'item_number') {
				$sql = "select * from Item where item_no='$_GET[keyword]' order by item_id desc";
			} elseif ($_GET[type] === 'lot_number') {
				$sql = "select * from Item where lot_no='$_GET[keyword]' order by item_id desc";
			}

			$result = mysql_query ($sql) or die ("SQL ERROR");
			$num = mysql_num_rows ($result);

			if (mysql_num_rows ($result) > 0)
			{
				while ($row = mysql_fetch_array ($result)) {
					echo '<tr> <th>'.$row["item_name"].'</th> <th>'.$row["item_no"].'</th><th>'.$row["lot_no"].'</th><th>'.$row["item_p"].'</th><th>'.$row["current_state"].'</th></tr>';
				}
			} else {
				echo '<p class="contents-input"> No matching Items </p>';
			}
			mysql_close($conn);
            ?>
    	
    	</table>
    	</div>
    	</div>
    	<div id = "right-square" class="about">
            <form action="./item_finder.php" method="GET">
                <input type="text" name="item_name" placeholder="Item Name">
                <input type="submit" value="Search">
            </form>
            <form action="./item_finder.php" method="GET">
                <select name="type">
					<option value="name">Item Name</option>
					<option value="item_number">Item Number</option>
					<option value="lot_number">Lot Number</option>
				</select>
				<script>
					document.form.type='<?=$type?>';
				</script>

                <input type="text" name="keyword"/>
                <input type="submit" value="Search"/>
            </form>
        
    
<!--	 <form name ="insert_form" class="contents" method="post" action="insert_process.php">
	<h2 class="contents-title"> INSERT PROCESS </h2>	
	<input type="text" name ="process_name" class="contents-input" placeholder="Process Name">
 	 <input type="text" name ="process_contents" class="contents-input" placeholder="Process Contents(0~100)">
 	 <input type="text" name ="process_key" class="contents-input" placeholder="Process key">
	 <input type="submit" name value="Insert" class="register-button"  onclick="check_id('check_id.php')">
	</form>

	<form name ="delete_form" class="contents" method="post" action="delete_process.php">
        <h2 class="contents-title"> DELETE PROCESS </h2>
        <input type="text" name ="process_name" class="contents-input" placeholder="Process Name">
        <input type="submit" name value="Delete" class="register-button" >
	
	</form>-->
	</div>
 </BODY>
</HTML>

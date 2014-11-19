<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<head>
  <meta charset="utf-8">
 <title>Registration Form</title>
  <link rel="stylesheet" href="../css/style.css">

<script>

var httpRequest = null;

function getXMLHttpRequest(){
     if(window.ActiveXObject){
        try{
                return new ActiveXObject("Msxml2.XMLHTTP");
        }catch(e){
                try{
                        return new ActiveXObject("Microsoft.XMLHTTP");
                }catch(e1){
                        return(null);
                }
        }
     }else if(window.XMLHttpRequest){
           return new XMLHttpRequest();
     }else{
           return null;
     }
}

 

function load(url){
     httpRequest = getXMLHttpRequest();
     httpRequest.onreadystatechange = viewMessage;
     httpRequest.open("GET", url, true);
     httpRequest.send(null);
}


function viewMessage(){
     if(httpRequest.readyState == 4){
         
	  if(httpRequest.status == 200){
           //        alert(httpRequest.responseText);
		
			
                  if(httpRequest.responseText.trim() != 'ok'){
                        var frm = document.register_form;
                             frm.user_id.value = "";
                             frm.user_id.placeholder = "ID ALREADY EXISTS"  ; 
                  }
		  else{
                      var frm = document.register_form;
                          frm.user_id.placeholder = "ID(4-15)";   
                 } 
        
	   }else{
                   alert("실패하였습니다 : "+httpRequest.status);
           }
     }
}


function check_id(url){
  var frm  = document.register_form;
  var user_id   = frm.user_id;
  var id = user_id.value; 
 // alert(id);
 if(id.length < 4){ user_id.placeholder = "TOO SHORT(4-15)"; user_id.value = ""; return; }
 else if ( id.length > 15 ){ user_id.placeholder = "TOO LONG(4-15)"; user_id.value = ""; return ;}
 else { user_id.placeholder ="ID(4-15)";}
 
    var ul = url+"?id="+id;
   load(ul);     

  // alert( " 4 < ID LENGTH  < 15 " ) ;  
 }

function check_pwd()
{

  var frm = document.register_form;
  var user_pwd = frm.user_pass1;
  var pwd = user_pwd.value;
 
if(pwd.length < 8 ){ user_pwd.placeholder = "TOO SHORT(8-16)" ; user_pwd.value = ""; return ; } 
else if(pwd.length > 16){ user_pwd.placeholder = "TOO LONG(8-16)" ; user_pwd.value = ""; return ; } 
else { user_pwd.placeholder="Password(8-16)"; return } 

}

function double_check()
{

  var frm = document.register_form;
  var user_pwd1 = frm.user_pass1;
  var user_pwd2 = frm.user_pass2;
 
if( user_pwd2.value != user_pwd1.value ){
user_pwd2.placeholder = "DIFFERENT" ;
user_pwd2.value = "";
return ; 
}
user_pwd2.placeholder ="Confirm Password";
}


</script> 
</head>
<body>
  <h1 class="register-title">Welcome</h1>


 
  <form name ="register_form" class="register" method="post" action="./signup.php">
    <div class="register-switch">
      <input type="radio" name="sex" value="F" id="sex_f" class="register-switch-input" checked>
      <label for="sex_f" class="register-switch-label">Female</label>
      <input type="radio" name="sex" value="M" id="sex_m" class="register-switch-input">
      <label for="sex_m" class="register-switch-label">Male</label>
    </div>
    <input type="text"  name ="user_id"  class="register-input" placeholder="Id(4-15)" onblur="check_id('check_id.php')" >
  <input type="text" name ="user_name" class="register-input" placeholder="Name(in English)">
     <input type="text" name ="user_phone" class="register-input" placeholder="Phone( without '-' )">
     <input type="email" name ="user_email" class="register-input" placeholder="Email address">
   
	<select name = "process" class="register-input">
	
	<?php
        include_once ('../config.php'); 
	$conn =  mysql_connect($DB['host'], $DB['id'], $DB['pw'] ) or die("DB ACCESS ERROR");
	mysql_select_db($DB['db'], $conn) or die("DB SELECT ERROR");
	$sql = "select * from Process";
	$result = mysql_query($sql) or die("SQL ERROR");
	$num = mysql_num_rows($result);
	echo '<option value="null" >Seletc Process</option >';
	if (mysql_num_rows($result) > 0) 
	{	
		while($row = mysql_fetch_array($result)){
		
			echo '<option value='.$row["p_id"].'> '.$row["p_name"]. '</option>';
		}	
	}else {

	    echo '<option value="null" > null </option>';
	}	
	mysql_close($conn);
	?>


     </select> 
	
	<input type="password" name ="user_pass1" class="register-input" placeholder="Password(8-16)" onblur="check_pwd()" >
     <input type="password" name ="user_pass2" class="register-input" placeholder="Confirm Password" onblur="double_check()">
    <input type="submit" name value="Create Account" class="register-button">
</form>

</body>
</html>

<?php
session_start();
?>
<html>
<head>
<title>TECHASE LOGIN</title>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />

<style>


@font-face {
font-family: "aq";
src: url("AquilineTwo.ttf");
src: local("aq"), url("AquilineTwo.ttf");
}

@font-face {
font-family: "tangerine";
src: url("Tangerine_Regular.eot");
src: local("tangerine"), url("Tangerine_Regular.eot");
}

@font-face {
font-family: "tangerine";
src: url("Tangerine_Regular.eot");
src: local("tangerine"), url("Tangerine_Regular.ttf");
}
body
{
color:#fff;

}

.font1
{ font: normal 155% 'Yanone Kaffeesatz', arial, sans-serif;
/*padding: 5px 0 0 17px;*/
color :#C0C0C0;
}
.font2
{
font: normal 200% 'aq', arial, sans-serif;
color:#fff;
margin:0;
}
.font3
{
font: normal 250% 'tangerine', arial, sans-serif;
color:#fff;
margin:0;
}
 		    
</style>
</head>
<body bgcolor="#000">
<center>
<img src="images/techase_banner1.jpg" width="100%"  height="150px" >
<br>
<span class="font3">
presents
</span>
<div class="font1">
<br>
<img src="images/techase_banner2.jpg" width="50%"  height="150px" >
<br><br>

<?php

$username=$_POST['username'];
$password=$_POST['password'];
$submit=strip_tags($_POST['submit']);

if($submit)
{

if($password&&$username)
{
  $connect=mysql_connect("localhost","tremor7g_techas","reset123") or die("Coulnt find db");
  mysql_select_db("tremor7g_techase4") or die("Couldnt find db");
  $query=mysql_query("SELECT * FROM users WHERE username='$username' ");
  $numrows=mysql_num_rows($query);
  if($numrows!=0)
  {
  
     //code to login
   		$row=mysql_fetch_assoc($query);
     		$dbusername=$row['username'];
     		$dbpassword=$row['password'];
     		$level=$row['level'];
                $dbfullname=$row['fullname'];
     
     //check to see if they match
     if($username==$dbusername&&md5($password)==$dbpassword)
     {
  
     $_SESSION['username']=$dbusername;     
     $_SESSION['time1']=time();
     $_SESSION['level']=$level;
     $_SESSION['msg']="<font color='#7A00A3'>Welcome</font> <font color='#CC0099'>".$dbfullname."</font><br>";
     $_SESSION['extract_level']='setting it';
     
     //include 'level.php';
     die("<font color='#7A00A3'>Congrats, You have been successfully logged in <br><br><a href='level.php'>Click here</a> to continue playing<br><br></font> ");
     }
     else
     {
     echo "<font color='red'>Incorrect password</font>";
     }
  }
  else
  {echo "<font color='red'>That user doesn't exist</font>";
  //die("That user doesn't exist");
  }
  
}
else
{
//die("Please enter a username and a password");
echo "<font color='red'>please enter a username and a password</font>";
}
}
?>
<br>
<form action="index.php" method='POST'>
Username :
<input type='text' name='username'><br><br>
Password : 
<input type='password' name='password'><br><br>
<input type='submit' name='submit' value="Log in">
<br><br>
<a href='register.php'>Register?</a>

</form>
</center>
</div>
<body>
</html>

<!-- a page with login fields !-->
<!--phpmyAdmin-create a new database 'phplogin'-create a table- 'users' - number of fields:3 - id (int,autoincrement)-username(varchar,25 characters) - password(varchar,100)-date(date/*date when user registered*/) SAVE --->
<!--username - alex;password -abc-->
<!--User registration - clean database-->


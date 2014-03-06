<?php
session_start();
?>
<html>
<head>
<title>TECHASE REGISTER</title>
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
.style1
{
color:red;
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

//session_start();


$username=$_POST['username'];
$password=$_POST['password'];

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
     $_SESSION['msg']="Welcome ".$dbfullname;
     $_SESSION['extract_level']='setting it';
     
     include 'level.php';
     //echo "you are in ! <a href='level.php'>Click</a> here to enter the member page.";
     }
     else
     {
     echo "incorrect password";
     }
  }
  else
  die("That user doesn't exist");

  
}
else
{
die("please enter a username and a password");
}
?>
</center>
</body>
</html>
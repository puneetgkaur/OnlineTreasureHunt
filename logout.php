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
$time1=$_SESSION['time1'];

$username=$_SESSION['username'];

session_destroy();

$connect=mysql_connect("localhost","tremor7g_techas","reset123") or die("Coulnt find db");
mysql_select_db("tremor7g_techase4") or die("Couldnt find db");

$time2=time();
$difference=$time2-$time1;
$new_value_time=$time1+$difference;
mysql_query("UPDATE users
SET time='$new_value_time'
WHERE username='$username' ");

//echo "$difference<br>";
echo "<font color='#990033'>Thanks for playing .. <br><br>Hope you enjoyed ..<br><br></font><font color='#CC3300'>You can always <a href='index.php'>log in</a> again and start from  the place where you stopped</font> <br><br><font color='#990033'> We are glad to see you playing here. Do come again .</font>";
//You have been successfully logged out</font>"; //<a href='index.php'>click</a> here to log in"
?>
</center>
</body>
</html>
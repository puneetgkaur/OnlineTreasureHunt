<?php
  session_start();
?>
<html>
<head>
<title>TECHASE</title>
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

 // if(isset($_SESSION['extract_level']))
 // {
  $level=$_SESSION['level'];
  $connect=mysql_connect("localhost","tremor7g_techas","reset123") or die("Coulnt find db");
  mysql_select_db("tremor7g_techase4") or die("Couldnt find db");
  $query=mysql_query("SELECT * FROM question_answer WHERE level='$level' ");
  $row=mysql_fetch_assoc($query);
  $_SESSION['ques']=$row['question'];
  $_SESSION['ans']=$row['answer'];
  
  //}
  $question=$_SESSION['ques'];
  //echo $level;	

  echo $_SESSION['msg'];
  echo "<br><br>";
  echo $question;
  

?>

<form action ='check_level.php' method='POST'>
<input type='text' name='answer'>
<input type='submit' name='submit' value='submit'>
</form>
<br>
<font color='#7A00A3'>
Wanna pause the game here ?<br>
<a href="logout.php">Click here</a> to log out
</font>
</center>
</body>
</html>
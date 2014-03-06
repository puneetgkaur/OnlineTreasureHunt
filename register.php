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

$submit=strip_tags($_POST['submit']);
$fullname=strip_tags($_POST['fullname']);
$username=strip_tags($_POST['username']);
$collegeName=strip_tags($_POST['collegeName']);
$branch=strip_tags($_POST['branch']);
$year=strip_tags($_POST['year']);
$email=strip_tags($_POST['email']);
$password=strip_tags($_POST['password']);
$repeatpassword=strip_tags($_POST['repeatpassword']);
$date=date("Y-m-d");
$time=0;
$level=1;
//echo md5("alex");
//echo '$username/$password/$repeatpassword/$fullname';
//echo '$username.$fullname';
$connect=mysql_connect("localhost","tremor7g_techas","reset123") or die("Coulnt find db");
mysql_select_db("tremor7g_techase4") or die("Couldnt find db");
$query=mysql_query("SELECT * FROM users WHERE username='$username' ");
$numrows=mysql_num_rows($query);

$query2=mysql_query("SELECT * FROM users WHERE email='$email' ");
$numrows2=mysql_num_rows($query2);



if($submit)
{
       if($numrows2!=0)
       {
        	echo "<br><span class='style1'>Sorry that email has already been registered</span><br>";
       }
       else
       {
 	if($numrows!=0)
 	{
  		echo "<br><span class='style1'>Sorry that username is not available</span><br>";
 	}	
 	else
 	{
 	
   		if($fullname&&$collegeName&&$branch&&$year&&$email&&$username&&$password&&$repeatpassword)
   		{
    
   		 if($password==$repeatpassword)
    		{
    			//check the username and fullname length
    	    
	    
	   	 if(strlen($username)>50||strlen($fullname)>50)
	    	{
	     		echo "<br><span class='style1'>Max limit for username and fullname is 50</span><br>";
	    	}
	    
	    	else
	    	{
			    if(strlen($password)>50||strlen($password)<6)
		    		{
		    		 echo "<br><span class='style1'>Password must be of length between 6-50</span><br>";
		    		}
		    	    else
		    		{
				    // code for register
		    
								    //encrypt the password
						        $password=md5($password);
					    		$repeatpassword=md5($repeatpassword);
						       //echo "success!";
						     //open database
						     $connect=mysql_connect("localhost","tremor7g_techas","reset123");  
						       mysql_select_db("tremor7g_techase4");
							       
							       $queryreg=mysql_query("
							       INSERT into users VALUES 	('','$fullname','$username','$password','$date','$collegeName','$branch','$year','$email','$time','$level','0')
							       
							       ");
							       
							       die ("<br><br>Congrats ! You have been successfully registered <br><br> <a href='index.php'>Click here</a> to start the game <br> ");
					
		       
		   		 }
	       }
	    }
    		else
	    {
	    echo "<br><span class='style1'>Your password doesnt match</span><br>";
	    }
            }
	  else
	  {
	    echo "<br><span class='style1">Please fill in all the fields</span><br>";
	  }
	  
	}
      }
}
?>


<form action ='register.php' method='POST'>
<table cellspacing="12px">
<tr>
<td>
Your full name :
</td>
<td>
<input type='text' name='fullname' value="<?php echo $fullname ?>">
</td>
</tr>
<tr>
<td>
College Name :
</td>
<td>
<input type='text' name='collegeName' value="<?php echo $collegeName ?>">
</td>
</tr>

<tr>
<td>
Branch :
</td>
<td>
<input type='text' name='branch' value="<?php echo $branch ?>">
</td>
</tr>

<tr>
<td>
Year :
</td>
<td>
<input type='text' name='year' value="<?php echo $year ?>">
</td>
</tr>

<tr>
<td>
Email id :
</td>
<td>
<input type='text' name='email' value="<?php echo $email ?>">
</td>
</tr>

<tr>
<td>
Username :
</td>
<td>
<input type='text' name='username' value="<?php echo $username ?>">
</td>
</tr>

<tr>
<td>
Password :
</td>
<td>
<input type='password' name='password' >
</td>
</tr>
<tr>
<td>
Repeat Password :
</td>
<td>
<input type='password' name='repeatpassword' >
</td>
</tr>
</table>
<br>
<input type='submit' name='submit' value='Register'>
</form>


</center>
</div>
<body>
</html>

<?php

echo "<h1>Register</h1>";
$submit=strip_tags($_POST['submit']);
$fullname=strip_tags($_POST['fullname']);
$username=strip_tags($_POST['username']);
$collegeName=strip_tags($_POST['collegeName']);
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
        	echo "Sorry that email has already been registered";
       }
       else
       {
 	if($numrows!=0)
 	{
  		echo "Sorry that username is not available !";
 	}	
 	else
 	{
 	
   		if($fullname&&$collegeName&&$email&&$username&&$password&&$repeatpassword)
   		{
    
   		 if($password==$repeatpassword)
    		{
    			//check the username and fullname length
    	    
	    
	   	 if(strlen($username)>50||strlen($fullname)>50)
	    	{
	     		echo "Max limit for username and fullname is 50";
	    	}
	    
	    	else
	    	{
			    if(strlen($password)>50||strlen($password)<6)
		    		{
		    		 echo "Password must be of length between 6-50";
		    		}
		    	    else
		    		{
				    // code for register
		    
								    //encrypt the password
						        $password=md5($password);
					    		$repeatpassword=md5($repeatpassword);
						       echo "success!";
						     //open database
						     $connect=mysql_connect("localhost","tremor7g_techas","reset123");  
						       mysql_select_db("tremor7g_techase4");
							       
							       $queryreg=mysql_query("
							       INSERT into users VALUES 	('','$fullname','$username','$password','$date','$collegeName','$email','$time','$level')
							       
							       ");
							       
							       die ("You have been registered! <a href='index.php'>Click here</a>");
					
		       
		   		 }
	       }
	    }
    		else
	    {
	    echo "Your password doesnt match";
	    }
            }
	  else
	  {
	    echo "Please fill in all the fields";
	  }
	  
	}
      }
}
?>


<form action ='register.php' method='POST'>
<table>
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
Email id :
</td>
<td>
<input type='text' name='email' value="<?php echo $email ?>">
</td>
</tr>

<tr>
<td>
username :
</td>
<td>
<input type='text' name='username' value="<?php echo $username ?>">
</td>
</tr>

<tr>
<td>
password :
</td>
<td>
<input type='password' name='password' >
</td>
</tr>
<tr>
<td>
repeat password :
</td>
<td>
<input type='password' name='repeatpassword' >
</td>
</tr>
</table>
<input type='submit' name='submit' value='Register'>
</form>

</form>

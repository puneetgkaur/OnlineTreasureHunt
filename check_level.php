<?php
  session_start();

  $submit=strip_tags($_POST['submit']);
  $user_answer=strtolower(trim(strip_tags($_POST['answer'])));


  $level_answer=$_SESSION['ans'];
  if($submit)
  {
     if( $level_answer==$user_answer )   
     {
       if($_SESSION['level']==15)
       {
        include 'final.php';
       }
       else
       {
       $_SESSION['msg']="<font color='#CC0099'>Congos ! That was the right answer. Here's your next question ..<br></font>";
       $_SESSION['level']=$_SESSION['level']+1;
       $level=$_SESSION['level'];
       $username=$_SESSION['username'];
       $connect=mysql_connect("localhost","tremor7g_techas","reset123") or die("Coulnt find db");
       mysql_select_db("tremor7g_techase4") or die("Couldnt find db");
       $query=mysql_query("UPDATE users SET level='$level' WHERE username='$username'");
       $_SESSION['extract_level']=1;
       include 'level.php';
       }
     }
     else
     {
       $_SESSION['msg']="<font color='#CC0000'>Oops, thats not the right answer<br><font color='#CC0066'>Give it another try ;-)</font> <br></font>";
       $_SESSION['extract_level']=NULL;
       include 'level.php';
     }
  }
  
  
?>
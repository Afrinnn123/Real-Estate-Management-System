<?php
session_start();
require_once('../Model/modeldb.php');
if(isset($_REQUEST['submit']))
{
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	if(empty($Username)||empty($Password))
	{
		$_SESSION['error_message']="Please fill in both Username & Password";
	}
	else
	{
       $status=auth($Username,$Password);
       if( $status)
       {
           header('location:../View/admin.php');
           exit();
       }
       else
       {
          $_SESSION['error_message']="Invalid User";
       }
	}
	header('location:../View/login.php');
   exit();
}
?>

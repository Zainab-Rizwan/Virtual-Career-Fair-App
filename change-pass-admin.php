<?php
session_start();
include('db_connection.php');

if (isset($_POST['re_password']))
	{

	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$re_pass = $_POST['re_pass'];
	$admin_id = $_SESSION['admin_id'];

	$query="SELECT * from admin_signup  where ID='$admin_id;'"; 
	$result=mysqli_query($conn, $query); 
	$row = mysqli_fetch_array($result);
	
	$database_pass=$row['password'];
	if ($old_pass==$database_pass)
		{
			$query1="UPDATE admin_signup set  password='$new_pass' where ID='$admin_id';";
			if ($row){mysqli_query($conn, $query1); 

			    session_destroy();
				header("location:pass_change.php");
			}
		}
		else
		{
			echo "Wrong password";
		}
	



	}
 
?>
<?php
session_start();
include('db_connection.php');

if (isset($_POST['re_password']))
	{

	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$re_pass = $_POST['re_pass'];
	$std_id = $_SESSION['std_id'];

	$query="SELECT * from student_signup  where ID='$std_id;'"; 
	$result=mysqli_query($conn, $query); 
	$row = mysqli_fetch_array($result);

	$database_pass=$row['password'];
	if ($old_pass==$database_pass)
		{
			$query1="UPDATE student_signup set  password='$new_pass' where ID='$std_id';";
			if ($row){mysqli_query($conn, $query1);
			
				echo "Your password has been changed";
			}
		}
		else
		{
			echo "Wrong password";
		}
	



	}
 
?>
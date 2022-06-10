<?php
session_start();
include('db_connection.php');
$job_id = $_GET['job_id'];
$std_id = $_GET['s_id'];

if (isset($_POST['register']) ){
    $slot=$_POST['format'];
	$cv = $_FILES['filename']['name'];

	$sql="INSERT INTO registered_for_job (job_id,std_id,time_slot,CV) 
           value ('$job_id','$std_id','$slot','$cv')";
    $res = $conn->query($sql);

	if($res){
		move_uploaded_file($_FILES["filename"]["tmp_name"], "CV/" . $_FILES["filename"]["name"]);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}
?>
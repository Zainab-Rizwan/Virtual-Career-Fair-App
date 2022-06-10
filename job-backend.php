<?php
session_start();
require_once('db_connection.php');

$rec_id = $_GET['rid'];
$fair_id = $_GET['fid'];
echo $_GET['rid'];
    $job_title=$_POST['jobtitle'];
    $job_des=$_POST['jobdescription'];
    $salary=$_POST['salarypackage'];
    $employment_type=$_POST['employment_type'];
    $job_type=$_POST['job_type'];
    $job_cat= $_POST["category"];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $each = $_POST['each'];
    $job_cat = implode(',',$job_cat);
    
    $sql="INSERT INTO jobs (rec_id,fair_id,job_title,job_des,salary,emp_type,job_type,job_cat,interview_stime,interview_etime,each_interview) values ('$rec_id','$fair_id','$job_title', '$job_des',  
          '$salary','$employment_type','$job_type','$job_cat','$stime','$etime','$each')";
           $res = $conn->query($sql);
	if($res){
		header("location:Fair details.php?fair_id=$fair_id");
	} 

?>
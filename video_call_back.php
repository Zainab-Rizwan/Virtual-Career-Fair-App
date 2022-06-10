<?php
session_start();
require_once('db_connection.php');
if(isset($_POST['token'])){
$fair_id = $_GET['fair_id'];
echo $fair_id;
$job_id = $_GET['job_id'];
$rec_id = $_GET['rec_id'];
$token = $_POST['token'];
$app_id = $_POST['appid'];

$sql="INSERT INTO token (fair_id,rec_id,job_id,app_id,token)
           value ('$fair_id','$rec_id','$job_id','$app_id ','$token')";
           $res = $conn->query($sql);
		if($res){
			header("location:Fair details.php?fair_id=$fair_id");
		} 
}
?>
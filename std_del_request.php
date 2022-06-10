<?php
session_start();
require_once('db_connection.php');
  $std_id = $_GET['s_id'];
  $fair_id = $_GET['f_id'];
  $sql = "DELETE from std_req where std_id='$std_id' and fair_id = '$fair_id'";
  $res = mysqli_query($conn , $sql);
  if($res){
  header("location:std_requests.php");
  die();
  }
?>
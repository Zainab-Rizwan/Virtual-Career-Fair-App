<?php
session_start();
require_once('db_connection.php');
  $rec_id = $_GET['r_id'];
  $fair_id = $_GET['f_id'];
  $sql = "DELETE from rec_req where rec_id='$rec_id' and fair_id = '$fair_id'";
  $res = mysqli_query($conn , $sql);
  if($res){
  header("location:rec_requests.php");
  die();
  }
?>

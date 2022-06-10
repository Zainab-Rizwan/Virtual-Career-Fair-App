<?php
session_start();
require_once('db_connection.php');

  $jid = $_GET['job_id'];
  $fid = $_GET['f_id'];
  $sql = "DELETE from jobs where ID='$jid'";
  mysqli_query($conn , $sql);
  header("location:Fair details.php?fair_id=$fid");
  die();

?>
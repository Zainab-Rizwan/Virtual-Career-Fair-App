<?php
session_start();
require_once('db_connection.php');
if(isset($_GET['fair_id'])){
  $id = $_GET['fair_id'];
  $sql = "DELETE from fairs where ID='$id'";
  mysqli_query($conn , $sql);
  header("location:admin_portal.php");
  die();
}
?>

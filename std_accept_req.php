<?php
session_start();
require_once('db_connection.php');
$std_id = $_GET['s_id'];
$fair_id = $_GET['f_id'];
$sql= "UPDATE std_req SET status='approved' where std_id= '$std_id' and fair_id='$fair_id' ";
$sql_insert="UPDATE std_req SET message='Your request to join fair has been accepted' where std_id= '$std_id' and fair_id='$fair_id' ";
if(mysqli_query($conn, $sql_insert))
{
    echo "<script>alert('message send successfully');</script>";
}
if( mysqli_query($conn, $sql) ){
    header("location:std_requests.php");
} 

?>
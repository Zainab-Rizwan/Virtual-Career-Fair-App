<?php
session_start();
require_once('db_connection.php');
$rec_id = $_GET['r_id'];
$fair_id = $_GET['f_id'];

$query="SELECT * from fairs  where ID='$fair_id'"; 
$result=mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);
$fair_name = $row['title'];
$msg = 'Your request to join '.$fair_name.' has been accepted';

$sql= "UPDATE rec_req SET status='approved' where rec_id= '$rec_id' and fair_id='$fair_id' ";
$sql_insert=mysqli_query($conn, "UPDATE rec_req SET message='Your request to join fair has been accepted' where rec_id= '$rec_id' and fair_id='$fair_id' ");
if($sql_insert)
{
    echo "<script>alert('message send successfully');</script>";
}
if( mysqli_query($conn, $sql) ){
    header("location:rec_requests.php");
} 
?>
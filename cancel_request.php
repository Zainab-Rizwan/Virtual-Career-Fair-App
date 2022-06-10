<?php
session_start();
include('db_connection.php');
if (isset($_SESSION['std_loggedin'])){
$fair_id = $_GET['fid'];
$std_id = $_GET['sid'];
$sql = "DELETE from std_req where std_id='$std_id' and fair_id = '$fair_id' ";
mysqli_query($conn , $sql);
header("location:Fair details.php?fair_id=$fair_id");
die();
}
if (isset($_SESSION['rec_loggedin'])){
    $fair_id = $_GET['fid'];
    $rec_id = $_GET['rid'];
    $sql = "DELETE from rec_req where rec_id='$rec_id' and fair_id = '$fair_id' ";
    mysqli_query($conn , $sql);
    header("location:Fair details.php?fair_id=$fair_id");
    die();
    }

?>
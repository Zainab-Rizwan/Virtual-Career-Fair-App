<?php
session_start();
include('db_connection.php');
if (isset($_SESSION['std_loggedin'])){
$std_id = $_GET['sid'];
$fair_id = $_GET['fid'];
$status = 'pending';
$sql ="INSERT INTO std_req (std_id,fair_id,status) value ('$std_id','$fair_id','$status')";
$res = $conn->query($sql);
if($res){
    header("location:Fair details.php?fair_id=$fair_id");
}
}
if (isset($_SESSION['rec_loggedin'])){
    $rec_id = $_GET['rid'];
    $fair_id = $_GET['fid'];
    $status = 'pending';
    $sql ="INSERT INTO rec_req (rec_id,fair_id,status) value ('$rec_id','$fair_id','$status')";
    $res = $conn->query($sql);
    if($res){
        header("location:Fair details.php?fair_id=$fair_id");
    }
    }
?>
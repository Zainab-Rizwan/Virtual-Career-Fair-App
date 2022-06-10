<?php
session_start();
include('db_connection.php');


$query="SELECT * from jobs where ID='37'"; 
$result=mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);

$stime = $row['interview_stime'];
$stime = date("g:i A", strtotime($stime));
echo $stime;

$etime = $row['interview_etime'];
$etime = date("g:i A", strtotime($etime));
echo $etime;

$each = $row['each_interview'];

$arr = [];
while ($stime <= $etime){
    array_push($arr,date("g:i A", strtotime($stime)));
    $stime = date("g:i A", strtotime($each." minutes",strtotime($stime)));
    
}

print_r($arr);

?>
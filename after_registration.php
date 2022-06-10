<?php
session_start();
include('db_connection.php');
$job_id = $_GET['job_id'];
$std_id = $_GET['s_id'];
$fair_id = $_GET['f_id'];

$query="SELECT * from jobs where ID='$job_id'"; 
$result=mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);

$stime = $row['interview_stime'];
$stime = date("g:i A", strtotime($stime));
// echo $stime;

$etime = $row['interview_etime'];
$etime = date("g:i A", strtotime($etime));
// echo $etime;

$each = $row['each_interview'];

$arr = array();
while ($stime <= $etime){
    array_push($arr,date("g:i A", strtotime($stime)));
    $stime = date("g:i A", strtotime($each." minutes",strtotime($stime)));
    
}
// print_r($arr);

if (isset($_POST['register']) ){
    $slot=$_POST['time'];
	$cv = $_FILES['cv']['name'];

	$sql="INSERT INTO registered_for_job (job_id,std_id,time_slot,CV) values ('$job_id','$std_id','$slot', '$cv')";
    $res = $conn->query($sql);

	if($res){
		move_uploaded_file($_FILES["cv"]["tmp_name"], "CV/" . $_FILES["cv"]["name"]);
		header("location:Fair details.php?fair_id=$fair_id");
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="">
	<script src="https://kit.fontawesome,com/a076d05399.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body>
<?php require "header.php"?>
<form method="post" action='after_registration.php?job_id=<?php echo $job_id?>&s_id=<?php echo $std_id?>&f_id=<?php echo $fair_id?>' enctype="multipart/form-data">
<div id="divider">
	<div id="right">
		<div class="menu"><br><br><br><br><br><br><br><br><br><br><br><br>
			<span class="form-title"><b>SELECT YOUR TIME SLOT</b></span>
			<div class="select">
				<select name="time" id="format" required>
					<option selected disabled>Time Slots</option>
					 <?php for($a=0; $a<count($arr)-1;$a++){
						$i = $a+1;
						$t = $arr[$a]."--"."$arr[$i]";
						// $job_id = $_GET['job_id'];
						$query4="SELECT * from registered_for_job where job_id = '$job_id' and time_slot='$t'";
						$mysqli_result4=mysqli_query($conn, $query4); 
						$row4=mysqli_fetch_array($mysqli_result4);
						if ($row4>1){?>
					    <option name="time" value="<?php echo $arr[$a]."--"."$arr[$i]"?>" disabled selected><?php echo $arr[$a]."--"."$arr[$i]"?></option> <?php }
					    else {?>
					   <option name="time" value="<?php echo $arr[$a]."--"."$arr[$i]"?>" ><?php echo $arr[$a]."--"."$arr[$i]"?></option> <?php }}?>
	
				</select>
			</div>
		</div>
	</div>
  
	<div id="left">
	
	
		<div id="container">
			
				
				<span class="form-title"><b>UPLOAD CV</b></span>
				<input type="file" id="myFile" name="cv" required >
			
		</div>
	
	</div>


<div class="btn1">
<input type='submit' class="btnbtn1" name="register" value="Register" > 
</div>
</form>
<?php require "footer.php"?> 
</div>
</body>
<style>
	
	.form-title{
		font-size:40px;
	}
	.btn1{
		text-align:center;
	}
	.btnbtn1{
		border:1px solid black;
		background:none;
		padding:10px 20px;
		font-size:40px;
		font-family:"montserrat";
		cursor:pointer;
		margin:10px;
		transition:0.5s;
		
	}
	.btnbtn1:hover{
		color:white;
	}
	
	
	#right{
		#background-color:blue;
		width:100%;
		height:500px;
		float:right;
	}
	#left{
		#background-color:#42b8f5;
		width:85%;
		height:500px;
		
	}
	#divider{
		padding-top:70px;
		background-image:url(imgs/bg1.png) ;
		background-repeat: no-repeat;
		background-size:cover;

	}
	#container{
		width: 0.1%;  
		min-height: 0.1vh;
		display: ruby-base;
		flex-wrap: wrap;
		justify-content: left;
		align-items: right ;
		padding: 10px;
		margin: 0 auto;
        position:right;
        border-right:100rem;
    }
	.menu{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 70.39vh;
		#background: #42b8f5;
		font-family: 'Open Sans', sans-serif;
		color: #fff;
		padding-bottom:80px;
		border-right-width: 10rem;
	}
	
	select {
		-webkit-appearance:none;
		-moz-appearance:none;
		-ms-appearance:none;
		appearance:none;
		outline:0;
		box-shadow:none;
		border:0!important;
		background: #E8E8E8;
		background-image: none;
		flex: 1;
		padding: 0 .5em;
		color:black;
		cursor:pointer;
		font-size: 1em;
		font-family: 'Open Sans', sans-serif;
	}
	select::-ms-expand {
		display: none;
	}
	.select {
		position: relative;
		display: flex;
		width: 20em;
		height: 3em;
		line-height: 3;
		background: #E8E8E8;
		overflow: hidden;
		border-radius: .25em;
	}
	.select::after {
		content: '\25BC';
		position: absolute;
		top: 0;
		right: 0;
		padding: 0 1em;
		background: #E8E8E8;
		cursor:pointer;
		pointer-events:none;
		transition:.25s all ease;
	}
	.select:hover::after {
		color: #E8E8E8;
	}
</style>
</html>
<?php
session_start();

require_once('db_connection.php');

 $rec_id = $_SESSION['rec_id'];

 $sql = "SELECT * from recruiter_signup2 where ID='$rec_id' ";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result) ;

 $sql1 = "SELECT * from rec_req where rec_id='$rec_id' and status = 'approved' ";
 $result1 = mysqli_query($conn, $sql1);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboars</title>
</head>

<style type="text/css">

body{
	margin: 10%;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
	font-family:'Times New Roman';
	font-size: 16px;
	text-align: center; 
}



footer.major {
	border: 4px;
	border-color: rgba(224, 224, 224, 1);
	border-style: solid;
	margin-top: 6em;
	padding: 2em 0;
	position: relative;
	text-align: center;
}

footer.major2 {
	border: 2px;
	border-color: rgba(224, 224, 224, 0.75);
	border-style: solid;
	margin: 3em auto;
	padding: 2em 0;
	width: 90%;
	position: relative;
}
p {
    margin: 0 0 10px;
}
h2 {
    font-size: 30px;
    font-weight: bold;
    text-transform: uppercase;
}
/* Button */

input[type="button"],
.button {
	transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
	 padding: 14px 28px;
	background: #4165ad;
	border-radius: 4px;
	border: 0;
	color: #ffffff;
	cursor: pointer;
	text-align: center;
	text-decoration: none;

}

	input[type="submit"]:hover,
	input[type="reset"]:hover,
	input[type="button"]:hover,
	.button:hover {
		background: #6e6570;
	}

.search
{
	margin-top: 10%;
}
</style>


<body>
<?php 
    require "header.php";
    ?>

    <!-- Profile -->
			<div id="main">	
				<footer class="major container" action="upload.php">
					<h2><b>Profile</b> </h2>
					<hr>
					<p style = 'font-size:15px; text-transform:capitalize'><b>Name:</b> <?php echo $row['rec_name']; ?> </p>
					<p style = 'font-size:15px; text-transform:capitalize'><b>Company Name:</b> <?php echo $row['com_name']; ?>  </p>
					<p style = 'font-size:15px; text-transform:capitalize'><b>Position: </b><?php echo $row['job_title']; ?>  </p>
					<p style = font-size:15px;><b>Years of Experience:</b> <?php echo $row['experience']; ?> </p>
					<p style = font-size:15px;><a href="view_rec_pro.php"><span style = "font-size:1.5rem; color:#4165ad; font-weight:bold;">Edit/View Profile</span></a></p>
				</footer>
			</div>
    	<!-- Main -->
		

			<div id="main">

			<footer class="major container">

<div id="search">
	<h2><b>Career Fairs</b></h2>
	<p style = font-size:15px;>The career fairs you've joined will appear here</p>
	
</div>

<?php

while ($row1 = mysqli_fetch_array($result1) ) {
$id = $row1['fair_id'];
$sql = "SELECT * from fairs where ID='$id' order by ID desc";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if ($row != 0){
$date = date("d-m-Y",strtotime($row['date']));
$s_time = date("g:i a", strtotime($row['start_time']));
$e_time = date("g:i a", strtotime($row['end_time'])); 
?>
<footer class="major2 container">
	<h2><b><?php echo $row['title']; ?></b></h2>
	<hr>
	<p style = font-size:15px;><b>Date: </b><?php echo $date; ?> </p>
	<p style = font-size:15px;><b>Start Time: </b><?php echo $s_time; ?> </p>
	<p style = font-size:15px;><b>End Time: </b><?php echo $e_time; ?></p>
	<p style = font-size:15px;><b>Description: </b><?php echo $row['description']; ?></p>
	<br>
	<br>
    <a href='Fair details.php?fair_id=<?php echo $id; ?>' class="button" style = "font-size:1.5rem; color:white; font-weight:bold;">View Details</a>
</footer>
<?php } }?>
</footer>


<!-- Footer -->
<?php include 'footer.php';?>



</body>
</html>
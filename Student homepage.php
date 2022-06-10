<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Homepage</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
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
/* Button */

input[type="button"],
.button {
	transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
	 padding: 14px 28px;
	background: #544d55;
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
	<!------Nav------->
	<?php include 'header.php';?>

	<!-- Header -->
			<div id="main">	
				<footer class="major container" action="upload.php">
					<h2>Profile</h2>
					<hr>
					<p>Name: </p>
					<p>Company Name: </p>
					<p>Position: </p>
					<p>Years of Experience: </p>
					<p><a href="#">Edit/View Profile</a></p>
						<form method="POST" action="upload.php" enctype="multipart/form-data">
						    <input type="file" name="file">
						    <input type="submit" value="Upload Resume">
						</form>
				</footer>
			</div>

		<!-- Main -->
		

			<div id="main">

					<footer class="major container">

								<div id="search">
									<h2>Career Fairs</h2>
									<p>The career fairs you've joined will appear here</p>
									
								</div>


								<footer class="major2 container">
									<h2>Career Fair 1</h2>
									<hr>
									<p>Start Time:</p>
									<p>End Time:</p>
									<p>Description:</p>
									<br>
									<a href="#" class="button">Join Now</a>
								</footer>


								<footer class="major2 container">
									<h2>Career Fair 2</h2>
									<hr>
									<p>Start Time:</p>
									<p>End Time:</p>
									<p>Description:</p>
									<br>
									<a href="#" class="button">Join Now</a>
								</footer>
				
				</footer>


		<!-- Footer -->
		<?php include 'footer.php';?>



  
</body>
</html>

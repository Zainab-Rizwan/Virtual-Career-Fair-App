<?php

session_start();
$msg="";
$msg1="";
$msg2="";
$msg3="";
$msg4="";
require_once('db_connection.php');
if (isset($_POST['next_page']))
{
	
	if(strpos($_POST['std_email'], 'uet.edu.pk')==true){
		$_SESSION['std_name']=$_POST['std_name'];
		if(!preg_match('/^[a-zA-Z ]*$/',$_SESSION['std_name']))
				{
					$msg2 = 'Name only contain alphabates and spaces';
				}
		$std_email=$_POST['std_email'];
		if(!filter_var($std_email,FILTER_VALIDATE_EMAIL))
		{
			$msg3='Invalid email format';
		}
		$_SESSION['std_email']=$_POST['std_email'];
		$_SESSION['std_pass']=$_POST['std_pass'];
		$_SESSION['std_conpass']=$_POST['std_conpass'];
		// $_SESSION['std_gender']=$_POST['gender'];
		$std_email=$_POST['std_email'];
		$std_pass=$_POST['std_pass'];
		$std_conpass=$_POST['std_conpass'];
		$uppercase = preg_match('@[A-Z]@', $std_pass);
		$lowercase = preg_match('@[a-z]@', $std_pass);
		$number    = preg_match('@[0-9]@',$std_pass);
		$specialChars = preg_match('@[^\w]@', $std_pass);
		if(!$uppercase || !$number || !$specialChars || strlen($std_pass) < 8) {
			if(!$uppercase){
				$msg4="Password should include at least one upper case letter.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			}
			if(!$number){
				$msg4="Password should include at least one number.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
			if(!$specialChars){
				$msg4="Password should include at least one special character.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
			if(strlen($std_pass)<8){
				$msg4="Password should be at least 8 characters.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
		}
		else{
		
			

			$id = $_POST["std_email"];

			$sql1="SELECT * from student_signup where email='$std_email'";
			$row = $conn->query($sql1);

			$sql2="SELECT * from admin_signup where email='$std_email'";
			$row1 = $conn->query($sql2);

			$sql3="SELECT * from recruiter_signup2 where rec_email='$std_email'";
			$row2 = $conn->query($sql3);
			
			if($row->num_rows > 0){
				$msg1 = "Email already exists!";
			}

			else if($row1->num_rows > 0){
				$msg1 = "Email already exists!";
			}

			else if($row2->num_rows > 0){
				$msg1 = "Email already exists!";
			}
			
			// if pass and confirm pass does not match
			else if($std_pass != $std_conpass){
				$msg = "Password does not match!";
			}
			else{
				$_SESSION['$id'] = $std_email;
			header("location:std_pro2.php?success=true");
			}
		}
		
		}
		else{
			$msg1 = "Email should be of format 2019abc00@uet.edu.pk";
			// echo "<script> window.alert('Email should be of format 2019abc00@uet.edu.pk'); </script>";
		}
		  
}
?>
<!DOCTYPE html>
<head>
      <title> Student | Sign Up | General Details</title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">	  
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>



<body>
<?php include_once "header.php" ?>

      <div class="container">
	    <div class="title">Student Sign Up</div>
		<div class="title1">General Details</div>
		<form action="std_signup1.php" method = "post">
		    <div class="user-details">
			   <div class="input-box">
			      <span class="details"> Full Name</span>
				  <input type="text" name="std_name" placeholder="Enter your Fullname here" required>
			   </div>
			   <?php echo $msg2 ?>
			    <div class="input-box">
			      <span class="details"> Email</span>
				<input type="email" name="std_email" class="form-control" placeholder="Enter your email address here only as 2019abc00@uet.edu.pk" required />
			   </div>
			   <?php echo $msg3 ?>
			   <?php echo $msg1 ?>
			    <div class="input-box">
			      <span class="details"> Password</span>
				  <input type="password" name="std_pass" placeholder="Enter your password here"  id="password-field" required>
				  <style type="text/css">
					@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";


					.input-box .details .toggle-password {
					position:absolute;
					width:40px;
					height:40px;
					top:2px;
					right:2px;
					border-radius:50%;
					text-align:center;
					line-height:35px;
					font-size:20px;
					cursor:pointer;
					}
					.toggle-password.active i.fa-eye {
					display:none;
					}
					.toggle-password.active i.fa-eye-slash {
					display:inline;
					}
					.toggle-password i.fa-eye-slash {
					display:none;
					}
					.password-policies {
					position:relative;
					top:0px;
					left:50%;
					transform:translateX(-50%);
					width:90%;
					padding:0px;
					height:0px;
					background:#f5f5f5;
					border-radius:5px;
					margin-top:10px;
					box-sizing:border-box;
					opacity:0;
					overflow:hidden;
					transition: height 300ms ease-in-out,
								opacity 300ms ease-in-out;
					}
					.password-policies.active {
					opacity:1;
					padding:10px;
					height:180px;
					}
					.password-policies > div {
					margin:15px 10px;
					font-weight:600;
					color:#888;
					transition:all 300ms ease-in-out;
					}
					.password-policies > div.active {
					color:#111;
					}
				</style>	
	        	
				<div class="toggle-password">
        			<i class="fa fa-eye"></i>
        			<i class="fa fa-eye-slash"></i>
      			</div>
      			<div class="password-policies">
        			<div class="policy-length">
          				8 Characters
        			</div>
        			<div class="policy-number">
          				Contains Number
        			</div>
        			<div class="policy-uppercase">
          				Contains Uppercase
        			</div>
        			<div class="policy-special">
          				Contains Special Characters
        			</div>
				</div>
            </div>
			<?php echo $msg4; ?>
			<script type="text/javascript" src="passValidation.js"></script>
			    <div class="input-box">
			      <span class="details">Confirm Password</span>
				  <input type="password" name="std_conpass" placeholder="Confirm password" required>
			   </div>
			</div>
            <?php echo $msg; ?>
			<div class="button"  >
			   
			   <input type="submit" value="Next" name="next_page">
               			
			</div>
		</form>
		</div>
		<?php include_once "footer.php" ?> 
	  </div>
	  
</body>
</html>


<style>

*{
	margin:0;
	padding:0;
	box-sizing:border-box;
	font-family:'Poppins',sans-serif;
	
}
body{
        display:flex;
	height:100%;
	justify-content:center;
	align-items:center;
        background:url("imgs/job.jpg");
	background-repeat:no-repeat;
	background-size:cover;
}

.title1{
	font-size:20px;
	font-weight:500;
	position:relative;
	text-align:center;
	color:white;
	font-family:"Poppins",sans-serif;
	padding-top:5px;

}




.container{
	max-width:700px;
	width:100%;
	padding:25px 30px;
	border-radius:5px;
}


.container .title{
	font-size:40px;
	font-weight:500;
	position:relative;
	text-align:center;
	color:white;
	font-family:"Poppins",sans-serif;
	padding-top:80px;
}
.container .title::before{
	content:'';
	position:absolute;
	left:0;
	bottom:0;
	height:3px;
	width:30px;	
}
 
.container .form .user-details{
	display:flex;
	flex-wrap:wrap;
	justify-content:space-between;
}
form .user-details .input-box{
	margin:20px 0 12px 0;
	width:calc(100%/2-20px);
}
.user-details .input-box .details{
	display:block;
	font-weight:500;
	margin-bottom:5px;
}

/* ajeeeb height */
.user-details .input-box input{
	height: 45px;
	width:100%;
	outline:none;
	border-radius:5px;
	border:1px solid #ccc;
	padding-left:15px;
	font-size:16px;
	border-bottom-width:2px;
	transition:all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
	border-color:white;
}
form .gender-details .gender-title{
	font-size:20px;
	font-weight:500;
}
form .gender-details .category{
	display:flex;
	width:80%;
	margin:14px 0;
	justify-content:space-between;
	
}
.gender-details .category label{
	display:flex;
	align-items:center;
}
.gender-details .category .dot{
	height:18px;
	width:18px;
	background:#d9d9d9;
	border-radius:50%;
	margin-right:10px;
	border:5px solid;
	transition:all 0.3s ease;
}

#dot-1:checked ~ .category label .one,
#dot-2:checked ~ .category label .two,
#dot-3:checked ~ .category label .three{
	border-color:#d9d9d9;
}
form input[type="radio"]{
	display:none;
	
}

form .button{
	height:100%;
	
}
form .button input{
	height:45px;
	width:100%;
	outline:none;
	color:#fff;
	border:none;
	font-size:18px;
	font-weight:500;
	letter-spacing:1px;
	border-radius:5px;
	background-color:#00007C; 
}
form .button input:hover{
	background-color:grey;
	
}
@media (max-width:584px){
	.container{
		max-width:100%;
	}
	form .user-details .input-box{
		margin-bottom:15px;
		width:100%;
	}
	form .gender-details .category{
		width:100%;
	}
	.conatainer form .user-details{
		max-height:100%;
		overflow-y:scroll
	}
}
</style>

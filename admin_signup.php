<?php
session_start();
$msg="";
$msg1="";
$msg2="";
require_once('db_connection.php');
if (isset($_POST['admin_register']))
{
        $ad_name=$_POST['ad_name'];
        $ad_email=$_POST['ad_email'];
        $ad_pass=$_POST['ad_pass'];
        $ad_conpass=$_POST['ad_conpass'];
		$ad_conNo=$_POST['ad_conNo'];
        $uppercase = preg_match('@[A-Z]@', $ad_pass);
		$number    = preg_match('@[0-9]@',$ad_pass);
		$specialChars = preg_match('@[^\w]@', $ad_pass);
		if(!$uppercase || !$number || !$specialChars || strlen($ad_pass) < 8) {
			if(!$uppercase){
				$msg2="Password should include at least one upper case letter.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			}
			if(!$number){
				$msg2="Password should include at least one number.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
			if(!$specialChars){
				$msg2="Password should include at least one special character.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
			if(strlen($ad_pass)<8){
				$msg2="Password should be at least 8 characters.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
		}
		else
		{

			$sql1="SELECT * from admin_signup where email='$ad_email'";
			$row = $conn->query($sql1);

			$sql2="SELECT * from student_signup where email='$ad_email'";
			$row1 = $conn->query($sql2);

			$sql3="SELECT * from recruiter_signup2 where rec_email='$ad_email'";
			$row2 = $conn->query($sql3);
			
			if($row->num_rows > 0){
				$msg='Email already exists!';
			}

			else if($row1->num_rows > 0){
				$msg='Email already exists!';
			}

			else if($row2->num_rows > 0){
				$msg='Email already exists!';
			}
			
			// if pass and confirm pass does not match
			else if($ad_pass != $ad_conpass){
				$msg1='Password does not match!';
			}
			else{
			$sql="INSERT INTO admin_signup (name,email,password,contactNo) value ('$ad_name', '$ad_email',  
			'$ad_pass','$ad_conNo')";
			$res = $conn->query($sql);

			if($res){
				header("location:admin_portal.php");
			} 
		 }
		}
	
}
?>
<!DOCTYPE html>
<head>
	<title>Admin | Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admin_signup_style.css">
	
    
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Nunito&family=Ubuntu:wght@300&display=swap');
	div 
	{
	  background-image: url(imgs/job.jpg);
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}
	</style>
</head>

<body>
	
	<div id="container">
	  <form action="admin_signup.php" method="post">
	  	<span class="form-title">ADMIN REGISTRATION</span>
	  	<input type="text" name="ad_name" placeholder="Full Name
		  " required><br>
	    <input type="email" name="ad_email" placeholder="Email" required><br>
		<?php echo $msg?>
	    <input type="password" name="ad_pass"placeholder="Password" id="password-field"required><br>
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
		<?php echo $msg2?>
			<script type="text/javascript" src="passValidation.js"></script>
		
	    <input type="password" name="ad_conpass" placeholder="Confirm Password" required><br>
		<?php echo $msg1?>
		<input type="number" name="ad_conNo"placeholder="Contact Number" required><br>
	    <span><button type = "submit" name="admin_register">Register</button></span><br>
	  </form>
	</div>
</body>
</html>

<?php
session_start();
$msg="";
$msg1="";
$msg2="";

require_once('db_connection.php');
//  include "header.php" ;

if (isset($_POST['rec_signup']))
{     
        $_SESSION['rec_name']=$_POST['rec_name'];
        $_SESSION['rec_email']=$_POST['rec_email'];
        $_SESSION['rec_pass']=$_POST['rec_pass'];
		$_SESSION['rec_conpass']=$_POST['rec_conpass'];
		// $_SESSION['rec_company_category=$_POST['rec_company_category'];
        $_SESSION['rec_city']=$_POST['rec_city'];
        $_SESSION['rec_country']=$_POST['rec_country'];
		$rec_email=$_POST['rec_email'];
		$rec_pass=$_POST['rec_pass'];
        $rec_conpass=$_POST['rec_conpass'];
		$uppercase = preg_match('@[A-Z]@', $rec_pass);
		$number    = preg_match('@[0-9]@',$rec_pass);
		$specialChars = preg_match('@[^\w]@', $rec_pass);
		if(!$uppercase || !$number || !$specialChars || strlen($rec_pass) < 8) {
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
			if(strlen($rec_pass)<8){
				$msg2="Password should be at least 8 characters.<br>
				Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			
			}
		}
		else{

			$sql1="SELECT * from admin_signup where email='$rec_email'";
			$row = $conn->query($sql1);

			$sql2="SELECT * from student_signup where email='$rec_email'";
			$row1 = $conn->query($sql2);

			$sql3="SELECT * from recruiter_signup2 where rec_email='$rec_email'";
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
			else if($rec_pass != $rec_conpass){
				$msg1='Password does not match!';
			}
			else{
				header("location:rec_signup2.php");
			}

		}
}
?>
<!DOCTYPE html>
<html>
<head>
      
	  <title> Recruiter | Sign Up </title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	  
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
	<body>
	<?php include_once "header.php" ?>
    <script type= "text/javascript" src = "countries.js"></script>
	<div class="back">
	<div class="container">
	    <div class="title">Recruiter Sign Up</div>
		<div class="title1">General Details</div>
		<form method="post" action="rec_signup.php" enctype="multipart/form-data">
		    <div class="user-details">
			<div class="input-box">
				<span class="details">Full Name</span>
				<input type="text" name="rec_name" style = "text-transform: capitalize;"class="form-control" required />
			</div>
			<div class="input-box">
				<span class="details">Email</span>
				<input type="email" name="rec_email" class="form-control" required />
			</div>
			<?php echo $msg ?>
			<div class="input-box">
				<label class="details">Password</label>
				<input type="password" name="rec_pass" class="form-control" id="password-field" required />
				
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
			<?php echo $msg2 ?>
            </div>
			<script type="text/javascript" src="passValidation.js"></script>
			<div class="input-box">
				<label class="details">Confirm Password</label>
				<input type="password" name="rec_conpass" class="form-control" required />
			</div>
			<?php echo $msg1 ?>
			<div class="input-box">
				<label class="details">Country</label>
				<select onchange="print_state('state',this.selectedIndex);" id="country" name ="rec_country" style = "text-transform: capitalize;"class="form-control"></select>
			</div>
		    <div class="input-box">
				<label class="details">State</label>
                <select name ="rec_city" id ="state" style = "text-transform: capitalize;"class="form-control" ></select>
			</div>
            <div class="button">
			   <input type='submit' name="rec_signup" value="Next">                   
			</div>
			<div class="text-muted" >
				<span>Already have an account! </span> <a href="login.php" style = "color= #00007C;">Login </a> Here
			</div>
			</div>
			</form>
			
			<script language="javascript">print_country("country");</script>
			<script language="javascript">print_country("state");</script>
		</div>
	  </div>
<?php include_once "footer.php" ?> 
		
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
a {
    color: #ffffff;
    text-decoration: none;
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

.text-muted {
    color: #000000;
	height: 45px;
	width:100%;
	padding-top:10px;
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

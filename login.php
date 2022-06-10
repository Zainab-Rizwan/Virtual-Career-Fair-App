
<?php 
$msg = "";
if (isset($_POST['login']))
{  
session_start();
require_once('db_connection.php');

$email=$_POST['email'];
$pass=$_POST['password'];

$email= stripcslashes ($email);
$pass= stripcslashes ($pass);



$sql1="SELECT * from admin_signup where email='$email'and password = '$pass'";
    $row = $conn->query($sql1);

$sql2="SELECT * from student_signup where email='$email'and password = '$pass'";
    $row1 = $conn->query($sql2);

$sql3="SELECT * from recruiter_signup2 where rec_email='$email'and password = '$pass'";
    $row2 = $conn->query($sql3);
        
if($row->num_rows > 0){
    $result = mysqli_fetch_assoc($row);
    $_SESSION['admin_loggedin'] = "OK";
    $_SESSION['admin_id'] = $result['ID'];
    $_SESSION['admin_name'] = $result['name'];
    header("location:admin_portal.php");
}

else if($row1->num_rows > 0){
    $result = mysqli_fetch_assoc($row1);
    $_SESSION['std_loggedin'] = "OK";
    $_SESSION['std_id'] = $result['ID'];
    $_SESSION['std_name'] = $result['name'];
    header("location:std_portal.php");
}
else if ($row2->num_rows > 0){
    $result = mysqli_fetch_assoc($row2);
    $_SESSION['rec_loggedin'] = "OK";
    $_SESSION['rec_id'] = $result['ID'];
    $_SESSION['rec_name'] = $result['rec_name'];
    header("location:rec_portal.php");
}
else{
    $msg = "Wrong Username (or) Password!!";
}

}
?>
<!DOCTYPE html>
<html>
<head>
      <title>Login</title>
      <meta charset="UTF-8">
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

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
	background-size:cover;
	background-color: #F7F7F7;
}
#backgroundimage {
background-image: url("imgs/bg1.png");
background-color: #F7F7F7;
width: 100vw;
height: 100vh; 
background-size: 100% 100%;
background-repeat: no-repeat;
position: relative;
}

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    background: #6665ee;
    font-family: 'Poppins', sans-serif;
}
::selection{
    color: #fff;
    background: #6665ee;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .form-control{
    height: 40px;
    font-size: 15px;
}
.container .form form .forget-pass{
    margin: -15px 0 15px 0;
}
.container .form form .forget-pass a{
   font-size: 15px;
}
.container .form form .button{
    background: #6665ee;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.container .form form .button:hover{
    background: #5757d1;
}
.container .form form .link{
    padding: 5px 0;
}
.container .form form .link a{
    color: #6665ee;
}
.container .login-form form p{
    font-size: 14px;
}
.container .row .alert{
    font-size: 14px;
}
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}
.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 0.5s ease-in-out;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}
</style>


<body>
<?php include_once "header.php" ?> 
<div id="backgroundimage">
   <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
               <form method = "post" action="login.php">
                    <h2 class="text-center">Login</h2>
                    <p class="text-center">Login with your email and password.</p>
                    	
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <p class="text-center" style=color:#003366><b><?php echo $msg;?></b></p>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="#popup1	" style = font-size:15px;>Signup now</a></div>
                    <div id="popup1" class="overlay">
	<div class="popup">
		<h2 >Sign up as:</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			 <br>
			<a href="rec_signup.php" style = "font-size:15px;">Recruiter</a> <br>
			<a href="std_signup1.php" style = "font-size:15px;">Student</a>

		</div>
	</div>
</div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
		
        <script type="text/javascript" src="js/main.js"></script>		
                         						 
</body>					  
</body>
</html>

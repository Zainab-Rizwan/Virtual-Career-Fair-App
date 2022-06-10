<?php
session_start();

require_once('db_connection.php');

 $admin_id = $_SESSION['admin_id'];

 require "header.php";
 $msg = "";
 $msg2 = "";

 if (isset($_POST['re_password']))
	{

	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$re_pass = $_POST['re_pass'];
	$admin_id = $_SESSION['admin_id'];
  $uppercase = preg_match('@[A-Z]@', $new_pass);
  $number    = preg_match('@[0-9]@',$new_pass);
  $specialChars = preg_match('@[^\w]@', $new_pass);
  if(!$uppercase || !$number || !$specialChars || strlen($new_pass) < 8) {
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
    if(strlen($new_pass)<8){
      $msg2="Password should be at least 8 characters.<br>
      Because Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    
    }
  }
  else{

	  $query="SELECT * from admin_signup  where ID='$admin_id;'"; 
    $result=mysqli_query($conn, $query); 
    $row = mysqli_fetch_array($result);
    
    $database_pass=$row['password'];
    if ($old_pass!=$database_pass){
        $msg="Old Password does not match!!";
    }
    else{
      $query1="UPDATE admin_signup set  password='$new_pass' where ID='$admin_id';";

      if (mysqli_query($conn, $query1)){
        session_destroy();?>
        <script> window.location.href="pass_change.php"; </script>
    <?php  }
    }
  }
} ?>


<html>
<br><br><br><br>
<div class="mainDiv">
  <div class="cardStyle">
    <form action="update_pass_admin.php" method="post" name="signupForm" id="signupForm">
      
      
      <h2 class="formTitle">
        CHANGE PASSWORD
      </h2>
    <div class="inputDiv">
      <label class="inputLabel" for="oldpassword">Old Password</label>
      <input type="password" id="password"  name="old_pass" required>
    </div>
    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" name="new_pass" id="password-field" required>
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
    </div>
			<script type="text/javascript" src="passValidation.js"></script>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="re_pass">
      
    </div><br>
    <div style="text-align: center; color:#003366; font-size:20px">
    <?php  echo $msg ?></div>
    <div class="buttonWrapper">
      <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary" name="re_password">
        <span style="color: white;">Change Password</span>
        <span id="loader"></span>
      </button >
    </div>

      
   </form>
</div>
      
  </form>
  </div>
</div>
</html>


<style >
  


  .mainDiv {
    display: flex;
    min-height: 100%;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
    font-family: 'Open Sans', sans-serif;
  }
 .cardStyle {
    width: 500px;
    border-color: white;
    background: #fff;
    padding: 36px 0;
    border-radius: 4px;
    /* margin: 30px 0; */
    box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);
  }

.formTitle{
  font-weight: 600;
  margin-top: 20px;
  color: #2F2D3B;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
  .inputDiv {
    width: 70%;
    display: flex;
    flex-direction: column;
    margin: auto;
  }
input {
  height: 40px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}
input:disabled {
  cursor: not-allowed;
  border: solid 1px #eee;
}
.buttonWrapper {
  margin-top: 40px;
}
 .submitButton {
    width: 70%;
    height: 40px;
    margin: auto;
    display: block;
    background-color: #003366;
    border-width: 0px;
    border-radius: 4px;
    font-size: 15px;
    cursor: pointer;
    position:relative;
    top:-30px;
  }

   .submitButton:hover {

    background-color: #46587a;

  }




</style>


<?php 
include "footer.php";
?>


<script>
var password = document.getElementById("password-field")
  , confirm_password = document.getElementById("confirmPassword");


function validatePassword() {
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
    return false;
  } else {
    confirm_password.setCustomValidity('');
    return true;
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;



function validateSignupForm() {
  var form = document.getElementById('signupForm');
  
  for(var i=0; i < form.elements.length; i++){
      if(form.elements[i].value === '' && form.elements[i].hasAttribute('required')){
        console.log('There are some required fields!');
        return false;
      }
    }
  
  if (!validatePassword()) {
    return false;
  }
  
  onSignup();
}

function onSignup() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    
    disableSubmitButton();
    
    if (this.readyState == 4 && this.status == 200) {
      enableSubmitButton();
    }
    else {
      console.log('AJAX call failed!');
      setTimeout(function(){
        enableSubmitButton();
      }, 1000);
    }
    
  };

}
  </script>
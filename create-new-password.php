<?php
require "header.php";
?>

<main>
	<div class="wrapper-main">
		<section class="section-default">
			<?php
			$selector = $_GET["selector"];
			$validator = $_GET["validator"]; //token used to validate the user inside the website
			if(empty($selector)|| empty($validator)){
				echo"Couldn't validate your request!";
			}else{
				if(ctype_xdigit($selector)!==false && ctype_xdigit($validator)!==false ){      //to check if tokens are hexadecimal tokens or not?
					?>

					<form action = "reset-password.php" method= "post">

                    <input type="hidden" name="selector" values="<?php echo $selector ?>">
                    <input type="hidden" name="validator" values="<?php echo $validator ?>">
                    <input type="password" name="pwd" placeholder="Enter a new password!">
                    <input type="password" name="pwd-repeat" placeholder="Repeat  new password!"> 
                    <button type ="submit" name="reset-password-submit">Reset password</button>
                </form>

					<?php
				}
			}
			?>
		</section>
	</div>
</main>
<?php
require "footer.php";
?>

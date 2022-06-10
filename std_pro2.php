<?php
session_start();

require_once('db_connection.php');

if (isset($_POST['std_profile']))
{
    $std_name= $_SESSION['std_name'];
    $std_email=$_SESSION['std_email'];
    $std_pass= $_SESSION['std_pass'];

        $ins_email=$_POST['ins_email'];
        $reg_no=$_POST['reg_no'];
		$cnic=$_POST['cnic'];

        $date_of_birth=$_POST['date_of_birth'];
        $gender=$_POST['gender'];
        $phone_no=$_POST['phone_no'];

		$std_address=$_POST['std_address'];
        $std_city=$_POST['std_city'];
        $std_country=$_POST['std_country'];
        $std_site=$_POST['std_site'];

        $ins_name=$_POST['ins_name'];
        $degree_type=$_POST['degree_type'];
        $degree_title=$_POST['degree_title'];
        $experience=$_POST['experience'];

        $major=$_POST['major'];
        $cgpa_div=$_POST['cgpa_div'];
        $comp_date=$_POST['comp_date'];

        $std_img = $_FILES['std_img']['name'];
// $temp = $_FILES['foto']['name'];

// $file_to_saved = "std_profiles/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
// move_uploaded_file($temp, $file_to_saved);

echo $file_to_saved;



		   $sql="INSERT INTO student_signup (name,email,password,ins_email, reg_no, cnic, date_of_birth, gender, phone_no, 
                                            std_address, std_city, std_country, std_site, 
                                            ins_name, degree_type, degree_title, 
                                            experience, major, cgpa_div, comp_date, images )
           value ('$std_name','$std_email','$std_pass','$ins_email', '$reg_no', '$cnic', '$date_of_birth', '$gender', '$phone_no', 
                                            '$std_address', '$std_city', '$std_country', '$std_site', 
                                            '$ins_name', '$degree_type', '$degree_title', 
                                            '$experience', '$major', '$cgpa_div', '$comp_date','$std_img')";
           $res = $conn->query($sql);
		if($res){
            move_uploaded_file($_FILES["std_img"]["tmp_name"], "std_profiles/" . $_FILES["std_img"]["name"]);
			header("location:successfully_registered.php");
		} 
        else
        {
            echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
        }
}

?>
<!DOCTYPE html>
<html>
<head>
      
	  <title> Student | Sign Up </title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	  <!-- <link rel="stylesheet" type="text/css" href="css/rec_style.css"> -->

      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	  
</head>
	<body style="background-color: #F7F7F7;">
    <div id="backgroundimage">
    <?php include_once "header.php" ?>
    
    <script type= "text/javascript" src = "countries.js"></script>


	<div class="container">
    <div class="row justify-content-center" >
    <div class="col-md-8"  style="border-radius: 5px; border-color: #00B3E7; color= #00007C;" >
    <form method="post" action="std_pro2.php" enctype="multipart/form-data" >

        <div class="card-header" style="text-align: center; background-color: #00007C; color: #ffffff; border-radius: 5px;" >Profile of Student</div>
        <div class="card-body" style="text-align: center; color: #000072; " >
	

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Institue Email Prefix</label>
                <div class="col-md-6">
				<input type="email" name="ins_email" value = "<?php echo $_SESSION['std_email']?>" class="form-control" disabled required />
			</div>
            </div>

            
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Registration/Roll Number</label>
                <div class="col-md-6">
				<input type="text" name="reg_no" class="form-control" required />
            </div>
            </div>


			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">CNIC Number</label>
                <div class="col-md-6">
				<input type="text" name="cnic" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                <div class="col-md-6">
                <input type="date" name="date_of_birth" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Gender </label>
                <div class="col-md-6">
                <select name="gender" class="form-control"required >
                    <option value=""disabled selected > Select Gender</option>
                    <option name="male" required value="Male">Male </option>
                    <option name="female" value="Female">Female</option>
                    <option name="prefernottosay" value="Prefer not to say">Prefer not to say</option>
                </select>
			</div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Mobile Phone Number</label>
                <div class="col-md-6">
				<input type="text" name="phone_no" class="form-control" required />
            </div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Address</label>
                <div class="col-md-6">
                <input type="text" name="std_address" class="form-control" required />
            </div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Country</label>
                <div class="col-md-6">
                <select onchange="print_state('state',this.selectedIndex);" id="country" name ="std_country" style = "text-transform: capitalize;"class="form-control"></select>
			
			</div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">State</label>
                <div class="col-md-6">
                <select name ="std_city" id ="state" style = "text-transform: capitalize;"class="form-control" ></select>
			
            </div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Personal Website(if any)</label>
                <div class="col-md-6">
				<input type="text" name="std_site" class="form-control"/>
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Add Your Profile Picture</label>
                <div class="col-md-6">
				<input type="file" name="std_img" required>
			</div>
            </div>

          <div class="card-header" style="text-align: center; background-color: #00007C; color: #ffffff; border-radius: 5px;">Academic Info</div>
            <div class="card-body">

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Institue Name</label>
                <div class="col-md-6">
				<input type="text" name="ins_name" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Degree Type</label>
                <div class="col-md-6">
                <select name="degree_type" class="form-control">
                    <option value=""disabled selected > Select Degree Type</option>
                    <option value="Matric" name="std_education"required>Matric</option>
					<option value="Intermediate" name="std_education">Intermediate</option>
					<option value="Under-Graduate" name="std_education">Under-Graduate</option>
					<option value="Graduate" name="std_education">Graduate</option>
					<option value="Post-Graduate" name="std_education">Post-Graduate</option>
                </select>
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Degree Title</label>
                <div class="col-md-6">
				<input type="text" name="degree_title" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Experience</label>
                <div class="col-md-6">
                <select id="expeirence" name="experience" class="form-control" required>
				    <option value=""disabled selected>Select Experience Level</option>
					<option value="Entry Level" name="std_experience" required>Entry Level</option>
					<option value="Intermediate" name="std_experience">Intermediate</option>
					<option value="Mid-Level" name="std_experience">Mid-Level</option>
					<option value="Senior or Executive Level" name="std_experience">Senior or Executive Level</option>
				  </select>
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Major</label>
                <div class="col-md-6">
				<input type="text" name="major" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">CGPA / Division</label>
                <div class="col-md-6">
				<input type="text" name="cgpa_div" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Degree Completion Date</label>
                <div class="col-md-6">
				<input type="date" name="comp_date" class="form-control" required />
			</div>
            </div>
            </div>
            
            <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <div class="button">
			   <input type='submit' name="std_profile" value="Register"  >                   
			</div>
            </div>
</div>
			</div>
			</form>
            
			<script language="javascript">print_country("country");</script>
			<script language="javascript">print_country("state");</script>
</div>
</div>
</div>
</div>
<?php include_once "footer.php" ?> 
		</div>
	  </div>

    </div>	
	</body>
</html>

<style>
*{
    margin: 0;
    padding: 0;
    color: #00007C;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}
#backgroundimage {
background-image: url("imgs/bg1.png");
background-color: #F7F7F7;
width: 100vw;
height: 100vh; 
background-size: 100% 100%;
background-repeat: repeat;
position: relative;
}
.card-header {
  text-align: center; 
  font-size: 150%;
  background-color: #00007C;  
  color: #ffffff;
}

.col-md-6 {
  color: #00007C;
}
.col-md-4
{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

form .button{
	height:45px;
	margin:45px 0;
}
form .button input{
	height:100%;
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
</style>

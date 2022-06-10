<?php
session_start();

require_once('db_connection.php');
 $id = $_GET['rec_id'];
 $sql1 = "SELECT * from recruiter_signup2 where ID='$id'";
 $result = mysqli_query($conn, $sql1);
 $row = mysqli_fetch_array($result);
 $rec_name = $row['rec_name'];
       $rec_email = $row['rec_email'] ;
  
       $rec_city = $row['city'];
       $rec_country = $row['country'];

       $rec_img = $row["rec_img"];

        $com_email=$row['com_email'];
		$cnic=$row['cnic'];

        $date_of_birth=date("d-m-Y",strtotime($row['date_of_birth']));
    
        $gender=$row['gender'];
        $phone_no=$row['phone_no'];

        	
        $job_title=$row['job_title'];
        $experience=$row['experience'];

        $com_logo = $row["com_logo"];

		$com_name=$row['com_name'];
        $com_phone_no=$row['com_phone_no'];
        $com_site=$row['com_site'];
	
		$com_address=$row['com_address'];
        $com_city=$row['com_city'];
        $com_country=$row['com_country'];


if (isset($_POST['rec_profile']))
{     
       $rec_name = $_SESSION['rec_name'];
       $rec_email = $_SESSION['rec_email'] ;
       $rec_pass = $_SESSION['rec_pass'];
    // $_SESSION['rec_company_category=$_POST['rec_company_category'];
       $rec_city = $_SESSION['rec_city'];
       $rec_country = $_SESSION['rec_country'];

       $rec_img = $_FILES["rec_img"]['tmp_name'];

        $com_email=$_POST['com_email'];
        // $rec_name=$_POST['rec_name'];
		$cnic=$_POST['cnic'];

        $date_of_birth=$_POST['date_of_birth'];
        $gender=$_POST['gender'];
        $phone_no=$_POST['phone_no'];

        	
        $job_title=$_POST['job_title'];
        $experience=$_POST['experience'];

        $com_logo = $_FILES["com_logo"]['tmp_name'];

		$com_name=$_POST['com_name'];
        $com_phone_no=$_POST['com_phone_no'];
        $com_site=$_POST['com_site'];
	
		$com_address=$_POST['com_address'];
        $com_city=$_POST['com_city'];
        $com_country=$_POST['com_country'];

        $sql3="SELECT * from recruiter_signup2 where com_email='$com_email'";
        $row2 = $conn->query($sql3);
        
        if($row2->num_rows > 0){
            echo "<script> window.alert('Email already exists!'); </script>";
        }
		   $sql="INSERT INTO recruiter_signup2 (rec_name,rec_email,password,city,country,rec_img,com_email,cnic,
           date_of_birth,gender,phone_no,job_title,experience,com_logo,
           com_name,com_phone_no,com_site,com_address,com_city,com_country) 
           value ('$rec_name','$rec_email','$rec_pass','$rec_city','$rec_country','$rec_img', '$com_email',  
          '$cnic','$date_of_birth','$gender', '$phone_no', '$job_title', '$experience','$com_logo',
          '$com_name','$com_phone_no','$com_site','$com_address','$com_city','$com_country')";
           $res = $conn->query($sql);
           
           session_destroy();
           
		if($res){
           move_uploaded_file($_FILES["rec_img"]["tmp_name"], "rec_profiles/" . $_FILES["rec_img"]["name"]);
           move_uploaded_file($_FILES["com_logo"]["tmp_name"], "company_logos/" . $_FILES["com_logo"]["name"]);
		   header("location:login.php?success=true");
		} 
        
}
// echo $rec_ema;
?>
<!DOCTYPE html>
<html>
<head>
      
	  <title> Recruiter | Sign Up </title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	  <!-- <link rel="stylesheet" type="text/css" href="css/rec_style.css"> -->

      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	  
</head>
	<body style="background-color: #F7F7F7;">
    <div id="backgroundimage">
    <?php include_once "header.php" ?>


	<div class="container">
    <div class="row justify-content-center" >
    <div class="col-md-8"  style="border-radius: 5px; border-color: #00B3E7; color= #00007C;" >
    <form method="post" action="rec_signup2.php" enctype="multipart/form-data">

        <div class="card-header" style="text-align: center; background-color: #00007C; color: #ffffff; border-radius: 5px;" >Profile of Recruiter</div>
        <div class="card-body" style="text-align: center; color: #000072; " >
        <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Image</label>
                <div class="col-md-6">
                  <input type="file" name="rec_img" required>
                </div>
              </div>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Primary Email</label>
                <div class="col-md-6">
                <input type="email" name="rec_email"  value = "<?php echo $_SESSION['rec_email']?>" class="form-control" disabled/>
			
			</div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company Email</label>
                <div class="col-md-6">
				<input type="email" name="com_email" class="form-control" required />
			</div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
				<input type="text" name="rec_name" value = "<?php echo $_SESSION['rec_name']?>" class="form-control" disabled />
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
                <select name="gender" class="form-control">
                    <option name="male" value="Male">Male</option>
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
				<label class="col-md-4 col-form-label text-md-right">Job Title</label>
                <div class="col-md-6">
                <input type="text" name="job_title" style =" text-transform:capitalize; " class="form-control" required />
            </div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Experience</label>
                <div class="col-md-6">
				<input type="text" name="experience" class="form-control" required />
            </div>
            </div>
            

          <div class="card-header" style="text-align: center; background-color: #00007C; color: #ffffff; border-radius: 5px;">Company Info</div>
            <div class="card-body">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Company logo</label>
                <div class="col-md-6">
                  <input type="file" name="com_logo" required>
                </div>
              </div>
            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company Name</label>
                <div class="col-md-6">
				<input type="text" name="com_name" style =" text-transform:capitalize; " class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company Phone Number</label>
                <div class="col-md-6">
				<input type="text" name="com_phone_no" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company Website</label>
                <div class="col-md-6">
				<input type="url" name="com_site" class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company Address</label>
                <div class="col-md-6">
				<input type="text" name="com_address" style =" text-transform:capitalize; " class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company City</label>
                <div class="col-md-6">
				<input type="text" name="com_city" style =" text-transform:capitalize; " class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Company Country</label>
                <div class="col-md-6">
				<input type="text" name="com_country" style =" text-transform:capitalize; " class="form-control" required />
			</div>
            </div>

            </div>
            
            <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
			   <input type='submit' name="rec_profile" value="Register" style="width: 100px; height: 30px;" >                   
			</div>
            </div>

			</div>
			</form>
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
    color: #000076;
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
  color: #000076;
}
.col-md-4
{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

} 
</style>
>
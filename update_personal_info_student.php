<?php 
  session_start();
  include("db_connection.php");
  error_reporting(0);
  $id=$_GET['id'];
  $std_name =$_GET['std_name'];
  $std_email =$_GET['std_email'];
  $gender=$_GET['gender'];
  $date_of_birth=$_GET['date_of_birth'];
  $cnic=$_GET['cnic'];
  $phone_no=$_GET['phone_no'];
  $std_city=$_GET['std_city'];
  $std_country=$_GET['std_country']; 
  $std_address=$_GET['std_address'];

  $std_site=$_GET['std_site'];
  



  ?>



<!DOCTYPE html>
<html>
<head>
    <style>
        
        .button {
            height: 4.5em;
            width: 15rem;
            padding: 10px 0px 10px 0px;
            margin: 10px auto;
            cursor: pointer;
            font-size: 13px;
            text-align: center; 
            transition:.25s;
            background-color: #003366;
            border: 4px solid #ffff;
            border-radius: 50px;
            color: white !important;
            text-decoration: white !important;
          }
    </style>

	  <title> Student Personal Information </title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	  <!-- <link rel="stylesheet" type="text/css" href="css/rec_style.css"> -->

      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	  
</head>
	<body style="background-color: #F7F7F7;">
    <div id="backgroundimage">
    <?php include_once "header.php" ?>

     <div class="container">
      <div class="deletacc-container"> 
          <form action="Update personal info student.php?id=<?php echo $id;?>" method="GET">
            <br>
          <h2>UPDATE YOUR PROFILE</h2>
          <style>
               
            h2 {
          text-align: center;

            }
          </style>
          <br>


	<div class="container">
    <div class="row justify-content-center" >
    <div class="col-md-8"  style="border-radius: 5px; border-color: #00B3E7; color= #00007C;" >
    <form method="GET" action="Update personal info student.php?id=<?php echo $id;?>" enctype="multipart/form-data" >

        

        <div class="card-header" style="text-align: center; background-color: #003366; color: #ffffff; border-radius: 5px;" >Personal Information</div>

        <div class="card-body" style="text-align: center; color: #000072; " >
            <!---
             <img src="images/blank-profile.png"  />
             <style>
               img{
                height:140px;
               }  
             </style>
             <h5> PROFILE PICTURE</h5>
             <style>
                 h1{
                    height:14px;
                 }

             </style>
                --->
             <!----
            <input type='submit' name="std_profile" value="Add Picture"  >
             <input type='submit' name="std_profile" value="Remove Picture"  >
             ---->
             <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                <input type="hidden" name="id" id="id" value="<?php echo  $id ?>">    
				<input type="text" name="std_name" id="std_name" value="<?php echo $std_name ?>" class="form-control" required />
			</div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Institue Email Prefix</label>
                <div class="col-md-6">
				<input type="email" name="std_email" id="std_email" value="<?php echo $std_email ?>"  class="form-control" required />
			</div>
            </div>

            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Gender </label>
                <div class="col-md-6">
                <select name="gender" class="form-control"   required >
                    <option name="gender"  id="gender" required value="<?php echo $gender ?>"><?php echo $gender ?></option>
                    
                    
                    <option name="male" required value="Male">Male </option>
                    <option name="female" value="Female">Female</option>
                    <option name="prefernottosay" value="Prefer not to say">Prefer not to say</option>
                </select>
			</div>
            </div>


            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                <div class="col-md-6">
                <input type="text" name="date_of_birth" id="date_of_birth" value="<?php echo $date_of_birth ?>" class="form-control" required />
			</div>
            </div>


            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">CNIC Number</label>
                <div class="col-md-6">
				<input type="tel" name="cnic" id="cnic"  value="<?php echo $cnic?>" class="form-control" required />
			</div>
            </div>


            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Contact</label>
                <div class="col-md-6">
				<input type="tel" name="phone_no" id="phone_no" value="<?php echo $phone_no ?>" class="form-control" required />
            </div>
            </div>


            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">City</label>
                <div class="col-md-6">
				<input type="text" name="std_city" id="std_city" value="<?php echo $std_city ?>" class="form-control" required />
            </div>
            </div>

			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Country</label>
                <div class="col-md-6">
				<input type="text" name="std_country" id="std_country" value="<?php echo $std_country ?>" class="form-control" required />
			</div>
            </div>



			
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Address</label>
                <div class="col-md-6">
                <input type="text" name="std_address" id="std_address"   value="<?php echo $std_address ?>" class="form-control" required />
            </div>
            </div>

            
            <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right"> Website(if any)</label>
                <div class="col-md-6">
				<input type="text" name="std_site" id="std_site" value="<?php echo $std_site ?>"class="form-control"/>
			</div>
            </div>
         <input id="button" type="submit" name="submit"   >
       </div>
     </form>
   </div>
 </div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
<style>
input[type=submit]{
   
    height: 4.5em;
    width: 60rem;
    padding: 10px 0px 10px 0px;
    margin: 10px auto;
    cursor: pointer;
    font-size: 11px;
    text-align: center; 
    transition:.25s;
    background-color: #003366;
    border: 4px solid #ffff;
    
    color: white !important;
    text-decoration: white !important;
  }
  
    
}
</style>
<?php


if($_GET['submit']){

   $id=$_GET['id'];
   $std_name =$_GET['std_name'];
   $std_email =$_GET['std_email'];
   $gender=$_GET['gender'];
   $date_of_birth=$_GET['date_of_birth'];
   $cnic=$_GET['cnic'];
   $phone_no=$_GET['phone_no'];
   $std_city=$_GET['std_city'];
   $std_country=$_GET['std_country']; 
   $std_address=$_GET['std_address'];
   $std_site=$_GET['std_site'];

   $query="UPDATE `student_signup` SET `name` = '$std_name', `email` ='$std_email', `gender`='$gender', `date_of_birth`='$date_of_birth' ,`cnic`='$cnic', `phone_no`='$phone_no',`std_city`='$std_city',`std_country`='$std_country', `std_address`='$std_address', `std_site`='$std_site' WHERE `student_signup`.`ID` = '$id'";
   
  //  echo "Executing query $query \n";
   $data=mysqli_query($conn,$query);
  //  echo "Query executed, $data";

   if ($mysqli -> commit()) {
    echo "Commit transaction failed";
    $mysqli->close();
    exit();
  }
  
  
   if($data){
     echo "Record updated successfully";
   }
   else{
     echo "Failed to update record";
   }
   $mysqli->close();

}
?>



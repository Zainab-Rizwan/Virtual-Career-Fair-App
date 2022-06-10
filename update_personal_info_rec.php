<?php 

session_start();


  include("db_connection.php");
  error_reporting(0);
  $id=$_GET['id'];
  $rec_name =$_GET['rec_name'];
  $rec_email =$_GET['rec_email'];
  $rec_city=$_GET['rec_city'];
  $rec_country=$_GET['rec_country'];

  $cnic=$_GET['cnic'];
  $date_of_birth=$_GET['date_of_birth'];
  $gender=$_GET['gender'];
  $phone_no=$_GET['phone_no']; 





  ?>


<!DOCTYPE html>
<html>
<head>


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
          <form action="update personal info rec.php?id=<?php echo $id; ?>" method="GET">
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
    <form method="GET" action="update personal info rec.php?id=<?php echo $id; ?>" enctype="multipart/form-data" >

        

        <div class="card-header" style="text-align: center; background-color: #003366; color: #ffffff; border-radius: 5px;" >Personal Information</div>

        <div class="card-body" style="text-align: center; color: #000072; " >
             <!----
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
               <input type='submit' name="rec_pro" value="Add Picture"  >

             <input type='submit' name="rec_pro" value="Remove Picture"  >

                -------------->


             <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                <input type="hidden" name="id" id="id" value="<?php echo  $id ?>"> 
                <input type="name" name="rec_name" id="rec_name"  value="<?php echo $rec_name ?>" class="form-control" required />
            </div>
            </div>

   <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                <input type="email" name="rec_email" id="rec_email" value="<?php echo $rec_email ?>" class="form-control" required />
            </div>
            </div>


                    <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Gender </label>
                <div class="col-md-6">
                <select name="gender" id="gender" class="form-control">
                <option name="gender" required value="<?php echo $gender ?>"><?php echo $gender ?></option>
                    <option name="male" value="Male">Male</option>
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
                <input type="text" name="cnic" id="cnic" value="<?php echo $cnic ?>" class="form-control" required />
            </div>
            </div>

         
           <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Contact Number</label>
                <div class="col-md-6">
                <input type="text" name="phone_no" id="phone_no" value="<?php echo $phone_no ?>" class="form-control" required />
            </div>
            </div>

<div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">City</label>
                <div class="col-md-6">
                <input type="text" name="rec_city" id="rec_city" value="<?php echo $rec_city ?>" style =" text-transform:capitalize; " class="form-control" required />
            </div>
            </div>

           <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Country</label>
                <div class="col-md-6">
                <input type="text" name="rec_country" id="rec_country" value="<?php echo $rec_country ?>" class="form-control" required />
            </div>
            </div>
            
          
         <input id="button" type="submit" name="submit"  >



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
  $rec_name =$_GET['rec_name'];
  $rec_email =$_GET['rec_email'];
  $rec_city=$_GET['rec_city'];
  $rec_country=$_GET['rec_country'];

  $cnic=$_GET['cnic'];
  $date_of_birth=$_GET['date_of_birth'];
  $gender=$_GET['gender'];
  $phone_no=$_GET['phone_no']; 

  $query="UPDATE `recruiter_signup2` SET `rec_name` = '$rec_name', `rec_email` ='$rec_email', `city`='$rec_city', `country`='$rec_country' , `cnic`='$cnic',`date_of_birth`='$date_of_birth',`gender`='$gender', `phone_no`='$phone_no' WHERE `recruiter_signup2`.`ID` = '$id'";
   
  // echo "Executing query $query \n";
  $data=mysqli_query($conn,$query);
  // echo "Query executed, $data";

  if ($mysqli -> commit()) {
  echo "Commit transaction failed";
  $mysqli->close();
  exit();
  }
  
  
  if($data){
     header("location: view_rec_pro.php");
   }
  else{
     echo "Failed to update record";
   }
  $mysqli->close();

}
?>

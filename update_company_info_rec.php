<?php 
session_start();



  include("db_connection.php");
  error_reporting(0);
  $id=$_GET['id'];
  $com_name =$_GET['com_name'];
  $com_email =$_GET['com_email'];
  $job_title=$_GET['job_title'];
  $experience=$_GET['experience'];

  $com_phone_no=$_GET['com_phone_no'];
  $com_site=$_GET['com_site'];
  $com_city=$_GET['com_city'];
  $com_country=$_GET['com_country']; 
  $com_address=$_GET['com_address'];
  





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
      <form action="Update company info rec.php?id=<?php echo $id; ?>" method="GET">
            <br><br><br><br><br><br><br>
           
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
    <form method="GET" action="Update company info rec.php?id=<?php echo $id; ?>" enctype="multipart/form-data" >


        

        <div class="card-header" style="text-align: center; background-color: #003366; color: #ffffff; border-radius: 5px;" >Company Information</div>

        <div class="card-body" style="text-align: center; color: #000072; " >
               <!---
             <img src="images/Logo image.png"  />
             <style>
               img{
                height:140px;
               }  
             </style>
             <h5> COMPANY LOGO</h5>
             <style>
                 h1{
                    height:14px;
                 }
             </style>
            <input type='submit' name="rec_pro" value="Add Logo"  >
            <input type='submit' name="rec_pro" value="Remove Logo"  >
           <br>
             ------>
             <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Company Name</label>
                <div class="col-md-6">
        <input type="hidden" name="id" id="id" value="<?php echo  $id ?>">           
        <input type="text" name="com_name" id="com_name" value="<?php echo  $com_name ?>" style =" text-transform:capitalize; " class="form-control" required />
      </div>
            </div>

            
              <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
        <input type="text" name="com_email" id="com_email" value="<?php echo  $com_email ?>" class="form-control" required />
      </div>
            </div>

     <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Job Title</label>
                <div class="col-md-6">
        <input type="text" name="job_title" id="job_title" value="<?php echo  $job_title ?>" class="form-control" required />
      </div>
            </div>

           <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Experience</label>
                <div class="col-md-6">
        <input type="text" name="experience" id="experience" value="<?php echo  $experience ?>" style =" text-transform:capitalize; " class="form-control" required />
      </div>
            </div>
   <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Contact</label>
                <div class="col-md-6">
        <input type="text" name="com_phone_no" id="com_phone_no" value="<?php echo  $com_phone_no ?>" style =" text-transform:capitalize; " class="form-control" required />
      </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Company Website</label>
                <div class="col-md-6">
                <input type="text" name="com_site" id="com_site" value="<?php echo  $com_site ?>" class="form-control" required />
            </div>
            </div>


             <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">City</label>
                <div class="col-md-6">
                <input type="text" name="com_city" id="com_city" value="<?php echo  $com_city ?>" class="form-control" required />
            </div>
            </div>

             <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Country</label>
                <div class="col-md-6">
                <input type="text" name="com_country" id="com_country" value="<?php echo  $com_country ?>" class="form-control" required />
            </div>
            </div>

             <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Address</label>
                <div class="col-md-6">
                <input type="text" name="com_address" id="com_address" value="<?php echo  $com_address ?>" class="form-control" required />
            </div>
            </div>

         <input id="button"  type='submit' name="submit"  >
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
   $com_name =$_GET['com_name'];
   $com_email =$_GET['com_email'];
   $job_title=$_GET['job_title'];
   $experience=$_GET['experience'];
 
   $com_phone_no=$_GET['com_phone_no'];
   $com_site=$_GET['com_site'];
   $com_city=$_GET['com_city'];
   $com_country=$_GET['com_country']; 
   $com_address=$_GET['com_address'];
   
   $query="UPDATE `recruiter_signup2` SET `com_name` = '$com_name', `com_email` ='$com_email', `job_title`='$job_title', `experience`='$experience' , `com_phone_no`='$com_phone_no',`com_site`='$com_site',`com_city`='$com_city', `com_country`='$com_country', `com_address`='$com_address' WHERE `recruiter_signup2`.`ID` = '$id'";
   
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



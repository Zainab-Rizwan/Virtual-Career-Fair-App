<?php 
session_start();


 


  include("db_connection.php");
  error_reporting(0);
  $id=$_GET['id'];
  $ins_name =$_GET['ins_name'];
  $ins_email =$_GET['ins_email'];
  $reg_no=$_GET['reg_no'];
  $degree_type=$_GET['degree_type'];
  $degree_title=$_GET['degree_title'];
  $experience=$_GET['experience'];
  $major=$_GET['major'];
  $cgpa_div=$_GET['cgpa_div']; 
  $comp_date=$_GET['comp_date'];



  ?>
<!DOCTYPE html>
<html>
<head>
   
    <title> Personal Information </title>
    <meta name="viewport" content="width-device-width,initial_scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="css/rec_style.css"> -->

      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    
</head>
  <body style="background-color: #F7F7F7;">
    <div id="backgroundimage">
    <?php include_once "header.php" ?>

     <div class="container">
      <div class="deletacc-container"> 
          <form action="update academic info student.php?id=<?php echo $id; ?>" method="GET">
            <br><br><br><br><br><br><br><br><br>

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
    <form method="GET" action="update academic info student.php?id=<?php echo $id; ?>" enctype="multipart/form-data" >
   
        

           <div class="card-header" style="text-align: center; background-color: #003366; color: #ffffff; border-radius: 5px;">Academic Info</div><br>
            <div class="card-body">

           

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Institue Name</label>
                <div class="col-md-6">
        <input type="hidden" name="id" id="id" value="<?php echo  $id ?>">                   
        <input type="text" name="ins_name" id="ins_name"  value="<?php echo  $ins_name ?>" class="form-control" required />
      </div>
            </div>

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Institue Email</label>
                <div class="col-md-6">
        <input type="text" name="ins_email" id="ins_email" value="<?php echo $ins_email ?>" class="form-control" required />
      </div>
            </div>


            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Registration number</label>
                <div class="col-md-6">
        <input type="text" name="reg_no" id="reg_no"  value="<?php echo  $reg_no ?>" class="form-control" required />
      </div>
            </div>

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Degree Type</label>
                <div class="col-md-6">
                <select name="degree_type" id="degree_type" class="form-control"  value="<?php echo $degree_type ?>">
                <option name="degree_type" required value="<?php echo $degree_type ?>"><?php echo $degree_type ?></option>
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
        <input type="text" name="degree_title" id="degree_title"  value="<?php echo $degree_title ?>" class="form-control" required />
      </div>
            </div>

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Experience</label>
                <div class="col-md-6">
                <select id="expeirence" name="experience"   class="form-control" required>
          <option name="experience" required value="<?php echo $experience ?>"><?php echo $experience ?></option>
            
          <option value="Entry Level" name="stdexperience" required>Entry Level</option>
          <option value="Intermediate" name="std_experience">Intermediate</option>
          <option value="Mid-Level" name="std_experience">Mid-Level</option>
          <option value="Senior or Executive Level" name="std_experience">Senior or Executive Level</option>
          </select>
      </div>
            </div>

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Major</label>
                <div class="col-md-6">
        <input type="text" name="major" id="major"  value="<?php echo $major ?>"  class="form-control" required />
      </div>
            </div>

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">CGPA / Division</label>
                <div class="col-md-6">
        <input type="text" name="cgpa_div" id="cgpa_div"  value="<?php echo $cgpa_div ?>" class="form-control" required />
      </div>
            </div>

            <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Degree Completion Date</label>
                <div class="col-md-6">
        <input type="text" name="comp_date" id="comp_date"  value="<?php echo $comp_date ?>" class="form-control" required />
      </div>
            </div>
            </div>
            
         <input id="button" type="submit" name="submit" />
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
    width: 75rem;
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
   echo "Updating data.";
   $id=$_GET['id'];
   $ins_name =$_GET['ins_name'];
   $ins_email =$_GET['ins_email'];
   $reg_no=$_GET['reg_no'];
   $degree_type=$_GET['degree_type'];
   $degree_title=$_GET['degree_title'];
   $experience=$_GET['experience'];
   $major=$_GET['major'];
   $cgpa_div=$_GET['cgpa_div']; 
   $comp_date=$_GET['comp_date'];
   $query="UPDATE `student_signup` SET `ins_name` = '$ins_name', `ins_email` ='$ins_email', `reg_no`='$reg_no', `degree_type`='$degree_type' ,`degree_title`='$degree_title', `experience`='$experience',`major`='$major',`cgpa_div`='$cgpa_div', `comp_date`='$comp_date' WHERE `student_signup`.`ID`  = '$id'";
   
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

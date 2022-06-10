<?php 
  
  include("db_connection.php");
  session_start();
  
       $id = $_SESSION['std_id'];
  
       $sql= "SELECT * FROM student_signup WHERE ID ='$id'";
       $result = mysqli_query($conn, $sql);
       $row=mysqli_fetch_array($result);
       $std_name = $row['name'];
       $std_email = $row['email'] ;
       $ins_email = $row['ins_email'] ;
       $reg_no = $row['reg_no'] ;
       $cnic = $row['cnic'] ;
       $date_of_birth = $row['date_of_birth'] ;
       $gender = $row['gender'] ;
       $phone_no = $row['phone_no'] ;
       $std_address = $row['std_address'] ;
       $std_city = $row['std_city'];
       $std_country = $row['std_country'];
       $std_site = $row['std_site'];
       $ins_name = $row['ins_name'];
       $degree_type = $row['degree_type'];
       $degree_title = $row['degree_title'];
       $experience = $row['experience'];
       $major = $row['major'];
       $cgpa_div = $row['cgpa_div'];
       $comp_date = $row['comp_date'];

       $images = $row["images"];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/rec_profile.css?<?php echo time(); ?>" />
    <title>Student Profile</title>
    
</head>
<body>
<?php include "header.php"; ?>    
    
<div id="container">
	
    <div id="left-nav">
            
            <div class="clip1">

			    <img  src="<?php echo $row['images']; ?>">
				<br><br>
				<form action="std_img.php?edit_id=<?php echo $id?>" method="POST">
					<input type="hidden" name="edit_id" value="<?php echo $id?>">
					<button  type="submit" name="edit_data_btn" class="btn btn-primary"> Edit</button>
				</form>
            
            </div>

            <div class="user-details">
                <h3 style = 'text-transform: capitalize;'><?php echo $std_name ?></h3>
                <!--  -->
            </div>
    </div>

    <div id="right-nav">
			<h1>Personal Info</h1>
			<hr />
			<br />
			<?php
			
			
				// $id = $test['user_id'];	
				echo " <div class='info-user'>";
				echo " <div style = 'text-transform: capitalize;'> ";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$std_name."";
				echo "</div> ";
				echo "<hr /> ";		
				// echo "<br /> ";		
				echo " <div >";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;".$std_email."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$gender."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>DOB</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$date_of_birth."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>CNIC</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$cnic."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;".$phone_no."";
				echo "</div> ";
				echo "<hr /> ";	
				
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$std_city."";
				echo "</div> ";
				echo "<hr /> ";	
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Country</label>&nbsp;&nbsp;&nbsp;&nbsp;".$std_country."";
				echo "</div> ";
				echo "<hr /> ";	
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;".$std_address."";
				echo "</div> ";
				echo "<hr /> ";	
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Website</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$std_site."";
				echo "</div> ";
				echo "<hr /> ";	
                echo "</div> ";
				echo " <div class='edit-info'>";
				echo " <a href ='update_personal_info_student.php?id=$id& std_name=$std_name& std_email=$std_email& gender=$gender& date_of_birth=$date_of_birth& cnic=$cnic& phone_no=$phone_no& std_city=$std_city& std_country=$std_country& std_address= $std_address& std_site=$std_site'><button>Edit Profile</button></a>";
				echo "</div> ";
				echo "<br /> ";	
				echo "<br /> ";	
			?>
			
		</div>


        <div id="right-nav">
			<h1 style = "margin-left:10px;"> Academic Info</h1>
			<hr />
			<br />
			<?php
			
			
				// $id = $test['user_id'];	
				echo " <div class='info-user'>";
				echo " <div style = 'text-transform: capitalize;'> ";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$ins_name."";
				echo "</div> ";
				echo "<hr /> ";		
				// echo "<br /> ";		
				echo " <div >";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Email</label>&nbsp;&nbsp;&nbsp;".$ins_email."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Reg No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$reg_no."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Degree type</label>&nbsp;&nbsp;&nbsp;".$degree_type."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Degree title</label>&nbsp;&nbsp;&nbsp;".$degree_title."";
				echo "</div> ";
				echo "<hr /> ";	
				// echo "<br /> ";		
				echo " <div>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Experience</label>&nbsp;&nbsp;&nbsp;&nbsp;".$experience."";
				echo "</div> ";
				echo "<hr /> ";	
				
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Major</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$major."";
				echo "</div> ";
				echo "<hr /> ";	
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>CGPA/Div</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$cgpa_div."";
				echo "</div> ";
                echo "<hr /> ";	
                echo " <div style = 'text-transform: capitalize;'>";
				echo " <label style = 'margin-left: 0px; font-size:20px'>Completion Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$comp_date."";
				echo "</div> ";
				echo "<hr /> ";	
                echo "</div> ";
				echo " <div class='edit-info'>";
				echo " <a href ='update_academic_info_student.php?id=$id& ins_name=$ins_name& ins_email=$ins_email& reg_no=$reg_no &degree_type=$degree_type & degree_title=$degree_title &experience=$experience & major=$major & cgpa_div=$cgpa_div& comp_date=$comp_date'><button>Edit Profile</button></a>";

				echo "</div> ";
				echo "<br /> ";	
				echo "<br /> ";	
			?>
			
		</div>

</div>


</body>

    </html>

<style>
	
img{
	height: 10px;
    width: 10px;
}	
.info-user{

font-size: 20px;
line-height: 25px;
/* text-align: center; */
}
@media screen and (max-width: 600px) {
	  .column {
	    width: 100%;
	    display: block;
	    margin-bottom: 20px;
	  }
</style>
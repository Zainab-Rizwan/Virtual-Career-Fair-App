<?php
session_start();
require_once('db_connection.php');
$query="SELECT * from std_req  where status = 'pending' order by ID desc"; 
$result=mysqli_query($conn, $query); 


?>
<!DOCTYPE html>
<html>
 <head>
      
	  <title> Fairs Requests </title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	  
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
 </head>
   <body>
	<?php include_once "header.php" ?>
	
	<div class="back">
	<div class="container">
	    
        <div class="title2" style = "color:white;">Students Requests </div>
		    <div class="user-details">
            <?php
				
				while ($row = mysqli_fetch_array($result) ) {
                $id = $row['std_id'];
                $fair_id = $row['fair_id'];
                $q2 = "SELECT * from fairs where ID='$fair_id'";
                $q_run2=mysqli_query($conn,$q2);
                $row2=mysqli_fetch_array($q_run2);
				$q1="SELECT * from student_signup where ID='$id'";
				$q_run1=mysqli_query($conn,$q1);
				$check_rec1=mysqli_num_rows($q_run1)>0; 

				if ($check_rec1)
				{     
						while($row=mysqli_fetch_array($q_run1))
						{
							?>
							<div class= "card-title">
								<img src="std_profiles/<?php echo $row['images']; ?>" weidth=100px height=100px alt="Stu Images">
							</div>
							<h1 class="card-title" style = 'text-transform: capitalize;'><?php echo $row['name']; ?></h1>
							<h1 class="card-title" style = 'text-transform: capitalize;'><?php echo $row['reg_no']; ?></h1>
                            <h1 class="card-title" style = 'text-transform: capitalize;'><?php echo $row2['title']; ?></h1>
							<div class="button">
								<button type='submit' name="rec_fullpro" onclick ="window.location.href='adminViewStdPro.php?s_id=<?php echo $id ?>'">View Full profile</button>             
							</div>
							<div class="clearfix">
								<button type="submit" class="acceptbtn"  onclick ="window.location.href='std_accept_req.php?s_id=<?php echo $id ?>&f_id=<?php echo $row2['ID'] ?>'" name = "create">Accept Request</button>
								<button type="button" class="declinebtn" onclick ="window.location.href='std_del_request.php?s_id=<?php echo $id ?>&f_id=<?php echo $row2['ID'] ?>'">Decline Request</button>
							</div>
							<?php
						}
           

			}
        } 
			?>
             </div>
            </div>
			</div> 
    <?php include_once "footer.php" ?> 
   </body>
</html>

<style type="text/css">
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
        background:url("imgs/job.jpg");
	background-repeat:no-repeat;
	background-size:cover;
}


.title2{
	font-size:40px;
	font-weight:500;
	position:relative;
	text-align:center;
	color:black;
	font-family:"Poppins",sans-serif;
	padding-top:5px;

}
.card-title{
	font-size:15px;
	font-weight:300;
	position:center;
	text-align:center;
	color:black;
	padding-top:5px;

}
.container{
	max-width:700px;
	width:100%;
	padding:25px 30px;
	border-radius:5px;
}
a {
    color: #ffffff;
    text-decoration: none;
}

.container .title{
	font-size:40px;
	font-weight:500;
	position:relative;
	text-align:center;
	color:white;
	font-family:"Poppins",sans-serif;
	padding-top:80px;
}
.container .title::before{
	content:'';
	position:absolute;
	left:0;
	bottom:0;
	height:3px;
	width:30px;	
}
 
.container .form .user-details{
	display:flex;
	flex-wrap:wrap;
	justify-content:space-between;
}
form .button{
	height:100%;
	
}
.button button{
	height:45px;
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
.button button:hover{
	background-color:grey;
	
}
button {
	background-color: Green;
	color: white;
	padding: 15px 20px;
	margin: 8px 0;
	cursor: pointer;
	width: 100%;
}
	
.declinebtn {
	padding: 15px 20px;
	background-color: #003366;
}
	
.declinebtn,
.acceptbtn {
	float: left;
	width: 50%;
}	
.clearfix::after {
	content: "";
	clear: both;
	display: table;
}
.clearfix button:hover{
	background-color:grey;
	
}
@media screen and (max-width: 300px) {
	.declinebtn,
	.acceptbtn {
		width: 100%;
	}
}
</style>
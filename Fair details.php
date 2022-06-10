<?php
session_start();
include('db_connection.php');
$id = $_GET['fair_id'];
$query="SELECT * from fairs  where ID='$id'"; 
$result=mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);



$field_ID= $row['ID'];
$field_admin_id= $row['admin_id'];
$field_title= $row['title'];
$field_description= $row['description'];
$field_date= $row['date'];
$field_start_time= $row['start_time'];
$field_end_time= $row['end_time'];

$query1="SELECT * from admin_signup  where ID='$field_admin_id'"; 
$result1=mysqli_query($conn, $query); 
$row1 = mysqli_fetch_array($result);




if (isset($_SESSION['std_loggedin'])){
$std_status ="";
$sid = $_SESSION['std_id'];
$query1="SELECT * from std_req  where std_id =$sid and fair_id ='$id'"; 
$result1=mysqli_query($conn, $query1); 
$row1 = mysqli_fetch_array($result1);
if ($row1 > 1) {
$std_status = $row1['status'];
}
}
if (isset($_SESSION['rec_loggedin'])){
	$rec_status ="";
	$rid = $_SESSION['rec_id'];
	$query1="SELECT * from rec_req  where rec_id=$rid and fair_id ='$id'"; 
	$result1=mysqli_query($conn, $query1); 
	$row1 = mysqli_fetch_array($result1);
	if ($row1 > 1) {
	$rec_status = $row1['status'];
	}
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fair Details</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src='jquery-3.2.1.min.js'></script>
</head>

<style type="text/css">
	@media screen and (max-width: 600px) {
	  .column {
	    width: 100%;
	    display: block;
	    margin-bottom: 20px;
	  }
	}

	body{
		margin: 10%;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
		font-size: 16px;
		text-align: center; 
	}

	footer.major {
		border: 4px;
		border-color: rgba(224, 224, 224, 1);
		border-style: solid;
		margin-top: 6em;
		padding: 1em;
		border-radius: 0px;
		position: relative;
		text-align: center;
	}

	.jumbotron {
		
		background-image: url("imgs/bg2.png");
		background-size: cover;
		margin:2em;
	}

	/*---------CARDS-----------*/
	.card1 {
		border: 2px;
		padding: 2em;
		border-color: rgba(224, 224, 224, 0.75);
		border-style: solid;
		font-size: 14px;
		margin: 2em;
	}

	.card0 {
		border-top: 0px !important;
		padding: 2em;
		margin-left: 2em;
		margin-right: 2em;
		font-size: 14px;
		border: 2px;
		border-color: rgba(224, 224, 224, 0.75);
		border-style: solid;
		}

	.card2 {
		font-size: 14px;
		padding: 2em;
		margin-top:3em !important;
		border: 2px;
		border-color: rgba(224, 224, 224, 0.75);
		border-style: solid;

	}

	.card3
	{
		font-size: 14px;
		width: 100%;
		margin-top:3em !important;
		margin:3.1em;
		border: 0px;
		border-color: rgba(224, 224, 224, 0.75);
		border-style: solid;
	}

	/*---------LINK-----------*/

	/* a{
	  	text-decoration: none !important;
		text-align: left;
	    margin: 2%;
	    transition: color .5s;
	    font-size: 16px;
	    font-weight: bold;
	    color: #46587a  !important;
	}

	a:hover {
	    color: #a1baea !important;
	    text-decoration: none !important;
	} */
	a:visited {
	    background-color: #a1baea !important;

	}

	a:actives {
	    background-color: #a1baea !important;

	}

	/*---------BUTTON-----------*/

	#button
	{
		height: auto;
		width: 10rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: white;
		border: 0px solid #fff;
		color: white;
		text-decoration: none !important;
		margin: 2%;
	    font-size: 16px;
	    font-weight: bold;
	    color: #46587a  !important;

	}

	#button1
	{
		height: auto;
		width: 10rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: white;
		border: 0px solid #fff;
		color: white;
		text-decoration: none !important;
		margin: 2%;
	    font-size: 16px;
	    font-weight: bold;
	    color: #46587a  !important;
   }

	#button2
	{
		height: auto;
		width: 10rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: white;
		border: 0px solid #fff;
		color: white;
		text-decoration: none !important;
		margin: 2%;
	    font-size: 16px;
	    font-weight: bold;
	    color: #46587a  !important;
 }
 #button3
 {
 		height: auto;
		width: 18rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 15px;
		text-align: center; 
		transition:.25s;
		background-color: #003366;
		border: 4px solid #fff;
		border-radius: 0px;
		color: white;
		text-decoration: none !important;

 }
 #button4
 {
	height: auto;
		width: 10rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: white;
		border: 0px solid #fff;
		color: white;
		text-decoration: none !important;
		margin: 2%;
	    font-size: 16px;
	    font-weight: bold;
	    color: #46587a  !important;
   }

   #button5
 {
	height: auto;
		width: 12rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: white;
		border: 0px solid #fff;
		color: white;
		text-decoration: none !important;
		margin: 2%;
	    font-size: 16px;
	    font-weight: bold;
	    color: #46587a  !important;
   }

   #button6
 {
 		height: auto;
		width: 18rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 15px;
		text-align: center; 
		transition:.25s;
		background-color: #003366;
		border: 4px solid #fff;
		border-radius: 0px;
		color: white;
		text-decoration: none !important;

 }
  

   /*---------BUTTON-----------*/

	.button {
		height: auto;
		width: 20rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: #4165ad;
		border: 4px solid #fff;
		border-radius: 50px;
		color: white;
		text-decoration: none !important;
	}

	.button0 {
		height: auto;
		width: 30rem;
		padding: 10px 0px 10px 0px;
		margin: 10px auto;
		cursor: pointer;
		font-size: 18px;
		text-align: center; 
		transition:.25s;
		background-color: #4165ad;
		border: 4px solid #fff;
		border-radius: 50px;
		color: white;
		text-decoration: none !important;
	}

	a:hover .button {
	    background-color: #fff;
	    border-color:#000;
	    border:2px;
	    color: #5C8DEF;
	    text-decoration: none !important;
	    border-style: solid;
	}
	/*---------PLACEHOLDER-----------*/
	#placeholder {
		width: 20rem;
		padding: 1%;
		border-radius: 4px;
		margin-top: 1%;
		margin-bottom: 10px;
		border: 2px;
		border-color: rgba(224, 224, 224, 0.75);
		border-style: solid;
	}

	.form-check-label
	{
		margin-left : 1.2em;
	}

         .container-xl{
           margin: auto;
         }
        .table-responsive {
            margin: 80px 0;
            margin-left:150px
        }

        .table-wrapper {
            background: #B9D9EB;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 800px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #003366;
            color: white;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h4 {
            margin: 5px 0 0;
            /* font-size: 24px; */
            color:white;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: white;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #F0F8FF;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            /* font-size: 22px; */
            color:red;
            /* margin: 0 15px; */
        }

        table.table td a {
            font-weight: bold;
            color: white;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }


        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #F0F8FF;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        } 

</style>

<body>
	<!------Nav------->
	<?php include 'header.php';?>

	<!-- Main -->
	<div id="main">
		<footer class="major container">
			<div class="jumbotron jumbotron-fluid" style="border-radius: 0px;background-color:#003366;">
			  <div class="container" >
			    <h1 style="color: white; text-align: center; "><?php echo $field_title; ?></h1>
			  </div>
			</div>	

			<div class="card0" style="margin-top: -1.4em;">
			  <div class="card-body">
			    <h4 class="card-title"><b>Date & Time</b></h4>
			     <p class="card-text">
			     	<?php
						$today= date("Y-m-d");
						$bool="true";
				 		$cond=($field_date>$today);
						$bool1="true";
				 		$cond1=($field_date==$today);
					    
						
					?>

				      <?php 
				      $d= date('l, jS F, Y, ', strtotime($field_date)); 
				      $st= date('h:i a -',strtotime($field_start_time));
				      $et= date(' h:i a',strtotime($field_end_time));
				      echo $d, $st, $et

				      ?>
			     </p>
				 <?php 
				 
				 if(isset($_SESSION['std_loggedin']) and $std_status == "pending") { ?>
			    <a href="cancel_request.php?sid=<?php echo $sid?>&fid=<?php echo $id ?>"> <div class="button" style = 'background-color:#003366;'>Cancel Request</div></a> <?php } ?>
				<?php if(isset($_SESSION['std_loggedin']) and $std_status != "pending" and $std_status != "approved" and $cond==$bool) { ?>
			    <a href="request.php?sid=<?php echo $sid?>&fid=<?php echo $id ?>"> <div class="button" style = 'background-color:#003366;'>JOIN NOW</div></a> <?php } ?>
				<?php if(isset($_SESSION['std_loggedin']) and $std_status == "approved") { ?>
			    <div class="button" style = 'background-color:#003366;'>JOINED</div></a> <?php } ?>
				<!--*************Recruiter*********** -->
				<?php if(isset($_SESSION['rec_loggedin']) and $rec_status == "pending" ) { ?>
			    <a href="cancel_request.php?rid=<?php echo $rid?>&fid=<?php echo $id ?>"> <div class="button" style = 'background-color:#003366;'>Cancel Request</div></a> <?php } ?>
				<?php if(isset($_SESSION['rec_loggedin']) and $rec_status != "pending" and $rec_status != "approved" and $cond==$bool) { ?>
			    <a href="request.php?rid=<?php echo $rid?>&fid=<?php echo $id ?>"> <div class="button" style = 'background-color:#003366;'>JOIN NOW</div></a> <?php } ?>
				<?php if(isset($_SESSION['rec_loggedin']) and $rec_status == "approved" ) { ?>
			    <div class="button" style = 'background-color:#003366;'>JOINED</div><?php } ?>
				<?php if (isset($_SESSION['rec_loggedin'])){
				      $rec_id = $_SESSION['rec_id'];
				      $query50="SELECT * from jobs  where rec_id='$rec_id' and fair_id='$id'"; 
                      $result50=mysqli_query($conn, $query50); 
                      $row50 = mysqli_fetch_array($result50);
				if($rec_status == "approved" and ($cond==$bool or $cond1==$bool1 )and $row50==0) { ?>
				<a href="job.php?rid=<?php echo $_SESSION['rec_id']?>&fid=<?php echo $id ?>"> <div class="button" style = 'background-color:#003366;'>Add Job</div></a> <?php } 
				else {?>
				<?php if($row50!=0){
					 $rec_id = $_SESSION['rec_id']; 
					 $query51="SELECT * from jobs  where rec_id='$rec_id' and fair_id='$id'"; 
                     $result51=mysqli_query($conn, $query51); 
                     $row51 = mysqli_fetch_array($result51);
					 $job_id = $row51['ID'];
					 $query54="SELECT * from token  where rec_id='$rec_id' and fair_id='$id' and job_id='$job_id'"; 
                     $result54=mysqli_query($conn, $query54); 
                     $row54 = mysqli_fetch_array($result54);?>
				<?php if($rec_status == "approved"  and $row50!=0 and $row54 ==0 and $cond1==$bool1) { ?>
				<a href="https://drive.google.com/folderview?id=1oiOt02pDCm27vfE9zPAXeoUSiMaWYqll"> <div class="button0" style = 'background-color:#003366;'>HOW TO GENERATE TOKEN</div></a>
				<form method="post" action='video_call_back.php?job_id=<?php echo $job_id?>&fair_id=<?php echo $id?>&rec_id=<?php echo $rec_id?>'> 
				<input style="width: 60%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 2px solid #ccc;
                 box-sizing: border-box;" type="text" name="appid" placeholder="App Id" required><br>
				 <input style="width: 60%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 2px solid #ccc;
                 box-sizing: border-box;" type="text" name="token" placeholder="Enter Token" required><br>
				<input  type="submit" class="button" value="Enter" name="submit_token"> 
				</form> <?php } 
				     ?> 
				<?php if($row54 !=0 and $cond1==$bool1) { 
					$token_id = $row54['id']?>
				<a href="video_call_rec.php?token=<?php echo $token_id?>"> <div class="button" style = 'background-color:#003366;'>START MEETING</div></a> <?php }} }}?>
			  </div>
			</div>	
			

			<div class="card0" style="margin-bottom: 2em;">
			  <div class="card-body">
				 
			    <?php if(!isset($_SESSION['admin_loggedin']) and !isset($_SESSION['rec_loggedin']) and !isset($_SESSION['std_loggedin'])) { ?>
				<button id="button">Details</button> <?php } ?> 

			    <?php if(isset($_SESSION['admin_loggedin'])) { ?>
				<button id="button">Details</button>
				<button id="button1">Jobs</button>	
			  	<button id="button2">Members</button> <?php } ?>  


			  	<?php if(isset($_SESSION['rec_loggedin'])) { ?>
				<button id="button">Details</button>
				<button id="button1">Jobs</button>	
				<button id="button4">My Job</button>
				<button id="button5">Candidates</button> <?php } ?> 
				
				<?php if(isset($_SESSION['std_loggedin'])) { ?>
				<button id="button">Details</button>
				<button id="button1">Jobs</button><?php } ?> 
				

				
			  </div>
			</div>

	<!-------------Details--------------->
	  	 	<div class="collapse" id="newpost1" style="margin-top: 0em;">
				  <div class="card card-body" style="padding:0em; border: 1px;">
							<div class="row">
							  <div class="col-sm-4">
							    <div class="card1">
							      <div class="card-body">
							        <span style="display: inline-block;"><img src="https://static.vecteezy.com/system/resources/thumbnails/000/349/744/small/Education__2823_29.jpg" style="width: 25%; margin-bottom: 0.5em;">
										  	<br>
										    </p  class="card-text">
										    	<?php
										    	$d1=strtotime($field_date);
												$d2=ceil((-$d1+time())/60/60/23);
												$d3=$d2-1;
												$now = new DateTime();
												
												if ($field_date< $now) 
													if ($d3<0) 
													{
													    echo "Coming up in ", -$d3, " days";
													}
													else
													{
													    echo $d3, " days ago";
													}
												elseif ($field_date== $now) 
													{
														echo "Today";
													}
										    	?>
										    </p>
										    <hr>
										    <h4 class="card-title"><b>Contact</b></h4>
											<?php
                                            $query1="SELECT * from admin_signup  where ID='$field_admin_id'"; 
                                            $result1=mysqli_query($conn, $query1); 
                                            $row1 = mysqli_fetch_array($result1);?>
										    <p class="card-text"><?php echo $row1['name']; ?></p>
										    <p class="card-text"><?php echo $row1['contactNo']; ?></p>
										    <p class="card-text"><?php echo $row1['email']; ?></p>
							      </div>
							    </div>
							  </div>

							  <div class="col-sm-8">
							    <div class="card1">
							      <div class="card-body">
							        <h3 class="card-title">Career Fair Description</h3>
							        <p class="card-text"><?php echo $field_description; ?></p>
							      </div>
							    </div>
							  </div>
					       </div>
					       </span>
				  </div>
		    </div>
	<!-------------Jobs--------------->
			<div class="collapse" id="newpost2" style="margin-top: 0em;">
				  <div class="card card-body" style="padding:0em; border: 1px;">

							<div class="row">
							  <div class="col-md-4">
							    <div class="card1">
							      <div class="card-body">
							        <span style="display: inline-block; text-align: left;">
										    <h3 class="card-text">Filters</h3>
										    <hr>
										    <h5 style = font-size:15px;><b>Job Title</b></h5 >
										    
										    <div class="form-check" i>
										    <input input type="text" id="Job-Filter" class="form-control" onkeyup="myFunction()"type="placeholder" name="">
											</div>

											<h5  style = font-size:15px><b>Company</b></h5 >
										    <div class="form-check">
										    <input input type="text" id="Company-Filter" class="form-control" onkeyup="myFunction1()"type="placeholder" name="">
										    
											</div>
											<br>




										    <h5 style = font-size:15px;><b>Job Type</b></h5>
										    <fieldset id="group1">
										    <div class="form-check filter" id="group2" >
										     <input  type="radio"  id="fil4" value="Cooperative Education" checked name="test"  name="group1" onclick="filter1()"><label>  Cooperative Education</label>
											 
											  <br>
											   <input  type="radio"  id="fil5" value="Experential Learning" checked name="test"  name="group1" onclick="filter2()"><label> Experential Learning</label>
											 
											  <br>
											   <input  type="radio"  id="fil6" value=" Fellowship" checked name="test"  name="group1" onclick="filter3()"><label> Fellowship</label>
										
											   <br>
											     <input  type="radio"  id="fil7" value=" Graduate School" checked name="test"  name="group1" onclick="filter4()"><label> Graduate School</label>
											
											   <br>
											    <input  type="radio"  id="fil8" value=" Internship" checked name="test"  name="group1" onclick="filter5()"><label> Internship</label>
											 
											   <br>
											   <input  type="radio"  id="fil9" value=" Job" checked name="test"  name="group1" onclick="filter6()"><label> Job</label>
											
											   <br>
											  <input  type="radio"  id="fil10" value=" Volunteer" checked name="test"  name="group1" onclick="filter7()"><label> Volunteer</label>
											</div>
										</fieldset>
											<br>


											<h5 style = font-size:15px;><b>Employment Type</b></h5>
											  <fieldset id="group2">
											<div class="form-check">
												<input  type="radio"  name="group2" id="fil1" value=" Full-time" checked name="test" onclick="myFunction3()"><label> Full-time</label>
											   
											  <br>
											  	<input  type="radio"  name="group2" id="fil2" value=" Part-time" checked name="test" onclick="myFunction4()"><label> Part-time</label>
											  <br>
											  <input  type="radio"  name="group2" id="fil3" value=" Seasonal" checked name="test" onclick="myFunction5()"><label> Seasonal</label>
											  <br>
											</div>
										</fieldset>


							      </div>
							    </div>
							  </div>



							  	<div class="col-md-8" id="myItems" style="overflow-y: auto; height: 42em;" >
							      	<?php	
                                    $id = $_GET['fair_id'];
							      	$query2="SELECT * from jobs where fair_id='$id' order by ID desc";
									$mysqli_result2=mysqli_query($conn, $query2); 
					
									// $rec_id = $row2['rec_id'];
									$query3="SELECT * from recruiter_signup2 ";
									$mysqli_result3=mysqli_query($conn, $query3); 
									
									
									while ($row2=mysqli_fetch_array($mysqli_result2) )  { 
										$job_id = $row2['ID'];
										$rec_id = $row2['rec_id'];
										$query3="SELECT * from recruiter_signup2 where ID = '$rec_id'";
									    $mysqli_result3=mysqli_query($conn, $query3); 
										$row3=mysqli_fetch_array($mysqli_result3);
                                        $query4="SELECT * from registered_for_job where job_id = '$job_id' and std_id";
									    $mysqli_result3=mysqli_query($conn, $query3); 
										$row3=mysqli_fetch_array($mysqli_result3);
                                      	echo
                                      			"<div class=card1>
                                      				<div class=card-body>


													    <h4 class=card-title style = font-size:20px;><b>Job Title:</b> ". $row2['job_title']."</h4><hr>"; ?>
													    <img src="<?php echo "company_logos/".$row3['com_logo']; ?>" width=175 height=200/> '
										<?php echo			"<h5 style = font-size:15px; class=card-title1 ><b>Company Name:</b> ". $row3['com_name']."</h5>
														<h5 style = font-size:15px;><b>Recruiter Name:</b> ". $row3['rec_name']."</h5>
				                                        <h5 style = font-size:15px;><b>Job Details:</b> ". $row2['job_des']."</h5>
														<h5 style = font-size:15px;><b>Salary Package and Allowances:</b> ". $row2['salary']."</h5>
				                                        <h5 class=card-text2 style = font-size:15px; value=". $row2['job_type']." id=". $row2['job_type']." ><b>Job Type:</b> ". $row2['job_type']."</h5>
				                                        <h5 style = font-size:15px; class=card-text value=". $row2['emp_type']." id=". $row2['emp_type']." ><b>Employment Type:</b> ". $row2['emp_type']."</h5>
														<h5 class=card-text1 style = font-size:15px;><b>Job Categories:</b> ". $row2['job_cat']."</h5>";?>
											<?php			if(isset($_SESSION['std_loggedin'])){
												            $std_id = $_SESSION['std_id'];
															$bool = "false";
															$query4="SELECT * from registered_for_job where job_id = '$job_id' and std_id='$std_id'";
									                        $mysqli_result4=mysqli_query($conn, $query4); 
										                    $row4=mysqli_fetch_array($mysqli_result4);
															if ($row4>1){
																$bool = "true";
															}
															if($std_status == "approved" and $bool == "false"){?>
											<?php echo	    "<button id=button3 onclick = window.location.href='after_registration.php?job_id=$job_id&s_id=$std_id&f_id=$id'>Register for Job</button> "; ?> <?php } 
											                if($std_status == "approved" and $bool == "true"){?>
											<?php echo	    "<div id='button3' style = 'background-color:#003366;'>Registered</div>" ?> <?php }} ?>
	                                    <?php echo "	</div>
	                                     </div>";  }	     
								     ?>
								 </div>
							     
					       </div>
					   </span>
				  </div>
		    </div>
	<!-------------MY Jobs--------------->
	<div class="collapse" id="newpost4" style="margin-top: 0em;">
				  <div class="card card-body" style="padding:0em; border: 1px;">

							<div class="row">




							  	<div class="col-md-12" id="myItem" style="overflow-y: auto; height: 42em;" >
							      	<?php	
									$r_id = $_SESSION['rec_id'];
                                    $id = $_GET['fair_id'];
							      	$query2="SELECT * from jobs where fair_id='$id' and rec_id = '$r_id'  order by ID desc";
									$mysqli_result2=mysqli_query($conn, $query2); 
					
									// $rec_id = $row2['rec_id'];
									$query3="SELECT * from recruiter_signup2 ";
									$mysqli_result3=mysqli_query($conn, $query3); 
									
									
									while ($row2=mysqli_fetch_array($mysqli_result2) )  { 
										$job_id = $row2['ID'];
										$rec_id = $row2['rec_id'];
										$query3="SELECT * from recruiter_signup2 where ID = '$rec_id'";
									    $mysqli_result3=mysqli_query($conn, $query3); 
										$row3=mysqli_fetch_array($mysqli_result3);

                                      	echo
                                      			"<div class=card1>
                                      				<div class=card-body>


													    <h4 class=card-title2 style = font-size:20px;><b>Job Title:</b> ". $row2['job_title']."</h4><hr>"; ?>
													    <img src="<?php echo "company_logos/".$row3['com_logo']; ?>" width=175 height=200/> '
										<?php echo			"<h5 style = font-size:15px;><b>Company Name:</b> ". $row3['com_name']."</h5>
														<h5 style = font-size:15px;><b>Recruiter Name:</b> ". $row3['rec_name']."</h5>
				                                        <h5 style = font-size:15px;><b>Job Details:</b> ". $row2['job_des']."</h5>
														<h5 style = font-size:15px;><b>Salary Package and Allowances:</b> ". $row2['salary']."</h5>
				                                        <h5 class=card-text1 style = font-size:15px;><b>Job Type:</b> ". $row2['job_type']."</h5>
				                                        <h5 style = font-size:15px; class=card-text value=". $row2['emp_type']." id=". $row2['emp_type']." ><b>Employment Type:</b> ". $row2['emp_type']."</h5>
				                                     
														<h5 class=card-text1 style = font-size:15px;><b>Job Categories:</b> ". $row2['job_cat']."</h5>
													
			                                            <button id=button6 onclick = window.location.href='update_job.php?job_id=$job_id&f_id=$id&r_id=$rec_id' >UPDATE JOB</button>  
														<button id=button6 onclick = window.location.href='del_job.php?job_id=$job_id&f_id=$id' >DELETE JOB</button>    
	                                    </div>
	                                     </div>";  }	     
								     ?>
								 </div>
							     
					       </div>
					   </span>
				  </div>
		    </div>
									

	<!-------------Participants--------------->
			<div class="collapse" id="newpost3" style="margin-top: 0em;">
				  <div class="card card-body" style="padding:0em; border: 1px;">
						<div class="row">	
						    <div class="card3">
						    	<div class="container-xl" style="overflow-x: auto;">
							        <div class="table" style="overflow-x: auto;">
							            <div class="table-wrapper" style="color:white;width:100%;">

							                <div class="table-title " >
							                    <div class="row">
							                        <div class="col-sm-12">
							                            <h4>Recruiters</h4>
							                        </div>								                       
							                    </div>
							                </div>

							                <div class="container my-4" style="background-color:#F0F8FF;text-align:center; width: 100%">
						                        <table class="table table-bordered" id=myTable1 style="background-color:rgba(0, 0, 250, 0.1); width: 100%; margin-top: 1em;">
								                    <thead style="overflow-x: auto;">
								                        <tr >     
								                        	<th style="text-align:center;" scope="col" >ID</th>      
						                                    <th style="text-align:center;" scope="col">Recruiter</th>
						                                    <th style="text-align:center;" scope="col">Company</th>
						                                    <th style="text-align:center;" scope="col">Job</th>
						                                </tr>
								                    </thead>
								                  
								                    <tbody style="overflow-x: auto;">
													<?php                                          
					                                    $query1 = "SELECT * FROM `rec_req` where status='approved'and fair_id=$id ";
					                                    $mysqli_result1=mysqli_query($conn, $query1); 
					                                    $Id=0;
					                                    while($row1 = mysqli_fetch_array($mysqli_result1))
					                                    {
				                                     		$recid= $row1['rec_id'];
							                                    $query = "SELECT * FROM `recruiter_signup2` where ID=$recid";
							                                    $mysqli_result=mysqli_query($conn, $query); 
							                                    while($row= mysqli_fetch_array($mysqli_result))
							                                    {
							                                        $Id += 1;
							                                        echo 
							                                    "<tr>
							                                        <th >". $Id . "</th>
							                                        <td>". $row['rec_name'] . "</td>
							                                        <td>". $row['com_name'] . "</td>
							                                        <td>". $row['job_title'] . "</td>			
							                                     </tr>";
						                                     	};
						                                 }
				                                     
														?>
								                    </tbody>
							                    </table>
											 </div>
						                 </div>
						             </div>
						        </div>
  
	    <script>
	        $(document).ready(function () {
	            $('#myTable1').DataTable();

	        });
	    </script>

        


						        <div class="container-xl" style="overflow-x: auto;">
							        <div class="table" style="overflow-x: auto;">
							            <div class="table-wrapper" style="color:white;width:100%;">

							                <div class="table-title " >
							                    <div class="row" >
							                        <div class="col-sm-12">
							                            <h4>Students</h4>
							                        </div>								                       
							                    </div>
							                </div>

							                <div class="container my-4" style="background-color:#F0F8FF;text-align:center; width: 100% ">
						                        <table class="table table-bordered" id=myTable2 style="background-color:rgba(0, 0, 250, 0.1); width: 100%; margin-top: 1em; ">
								                    <thead style="overflow-x: auto;">
								                        <tr>     
								                        	<th style="text-align:center;" scope="col" >ID</th>      
						                                    <th style="text-align:center;" scope="col">Name</th>
						                                    <th style="text-align:center;" scope="col">Registration No.</th>
						                                    <th style="text-align:center;"scope="col">Major</th>
						                                </tr>
								                    </thead>
								                  
								                    <tbody style="overflow-x: auto;">
								                    <?php                                          
					                                    $query5 = "SELECT * FROM `std_req` where status='approved'and fair_id=$id ";
					                                    $mysqli_result1=mysqli_query($conn, $query5); 
					                                    $Id=0;
					                                    while($row1 = mysqli_fetch_array($mysqli_result1))
					                                    {
				                                     		$stdid= $row1['std_id'];
							                                    $query = "SELECT * FROM `student_signup` where ID=$stdid";
							                                    $mysqli_result=mysqli_query($conn, $query); 
							                                    while($row= mysqli_fetch_array($mysqli_result))
							                                    {
							                                        $Id += 1;
							                                        echo 
							                                    "<tr>
							                                        <th >". $Id . "</th>
							                                        <td>". $row['name'] . "</td>
							                                        <td>". $row['reg_no'] . "</td>
							                                        <td>". $row['degree_title'] . "</td>			
							                                     </tr>";
						                                     	};
						                                 }
				                                     
														?>

								                    </tbody>
							                    </table>
											 </div>
						                 </div>
						             </div>
						        </div>
						    </div>
			     	  </div>
				  </div>
		    </div>

    <script>
        $(document).ready(function () {
            $('#myTable2').DataTable();

        });
    </script>


    <!-------------Candidates--------------->
			<div class="collapse" id="newpost8" style="margin-top: 0em;">
				  <div class="card card-body" style="padding:0em; border: 1px;">
						<div class="row">	
						    <div class="card3">
						    	<div class="container-xl" style="overflow-x: auto;">
							        <div class="table" style="overflow-x: auto;">
							            <div class="table-wrapper" style="color:white;width:100%;">

							                <div class="table-title " >
							                    <div class="row">
							                        <div class="col-sm-12">
							                            <h4>Candidates</h4>
							                        </div>								                       
							                    </div>
							                </div>

							                <div class="container my-4" style="background-color:#F0F8FF;text-align:center; width: 100%">
						                        <table class="table table-bordered" id=myTable8 style="background-color:rgba(0, 0, 250, 0.1); width: 100%; margin-top: 1em;">
							                    <thead style="overflow-x: auto;">
							                        <tr >     
							                        	<th style="text-align:center;" scope="col" >ID</th>      
					                                    <th style="text-align:center;" scope="col">Student</th>
					                                    <th style="text-align:center;" scope="col">Registration Number</th>
					                                    <th style="text-align:center;" scope="col">Degree Title</th>
					                                    <th style="text-align:center;" scope="col">Time Slot</th>
					                                    <th style="text-align:center;" scope="col">CV</th>
					                                    <th style="text-align:center;" scope="col">Job Title</th>
					                                </tr>
							                    </thead>
								                  
							                    <tbody style="overflow-x: auto;">
												<?php                                     
				                                    
				                                  	$r_id = $_SESSION['rec_id'];
				                                    $id = $_GET['fair_id'];
											      	$query2="SELECT * from jobs where fair_id='$id' and rec_id = '$r_id'";
													$mysqli_result2=mysqli_query($conn, $query2); 
													$Id=0;

													while ($row2=mysqli_fetch_array($mysqli_result2) ) 
													 { 
														$job_id = $row2['ID'];
														$rec_id = $row2['rec_id'];

														
														$query3="SELECT * from registered_for_job where job_id = '$job_id'";
													    $mysqli_result3=mysqli_query($conn, $query3); 
														while($row3=mysqli_fetch_array($mysqli_result3))
														{
															$Id+=1;
															$std_id = $row3['std_id'];

															$query4="SELECT * from student_signup where ID = '$std_id'";
														    $mysqli_result4=mysqli_query($conn, $query4); 
															$row4=mysqli_fetch_array($mysqli_result4);
														
															$filename = $row3['CV']; 
															
															echo
															"<tr>
						                                        <th >". $Id . "</th>
						                                        <th >". $row4['name'] . "</th>
						                                        <th >". $row4['reg_no'] . "</th>
						                                        <th >". $row4['degree_title'] . "</th>
						                                        <th >". $row3['time_slot'] . "</th>
						                                        <th ><button onclick=window.open('CV/".$filename."')>Download CV</button></th>

						                                        <th >". $row2['job_title'] . "</th>	
																		
						                                     </tr>";

					                                 }
					                                }
					                                ?>
								                    </tbody>
							                    </table>
											 </div>
						                 </div>
						             </div>
						        </div>
  
	    <script>
	        $(document).ready(function () {
	            $('#myTable8').DataTable();

	        });
	    </script>


	    
		</footer>
	</div>
	<!-- Footer -->
	<?php include 'footer.php';?>  

<script>

	//Job Search filter
	function myFunction() 
	{
	    var input, filter, cards, cardContainer, h4, title, i;
	    input = document.getElementById("Job-Filter");
	    filter = input.value.toUpperCase();
	    cardContainer = document.getElementById("myItems");
	    cards = cardContainer.getElementsByClassName("card1");
	    for (i = 0; i < cards.length; i++) 
	    {
	        title = cards[i].querySelector(".card-body h4.card-title");
	        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
	        {
	            cards[i].style.display = "";
	        } else
	        {
	            cards[i].style.display = "none";
	        }
	    }
	}

	//company Search filter
	function myFunction1() 
	{
	    var input, filter, cards, cardContainer, h5, title, i;
	    input = document.getElementById("Company-Filter");
	    filter = input.value.toUpperCase();
	    cardContainer = document.getElementById("myItems");
	    cards = cardContainer.getElementsByClassName("card1");
	    for (i = 0; i < cards.length; i++) 
	    {
	        title = cards[i].querySelector(".card-body h5.card-title1");
	        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
	        {
	            cards[i].style.display = "";
	        } else
	        {
	            cards[i].style.display = "none";
	        }
	    }
	}


	//dropdown1
	var button1 = document.getElementById('button');
	button1.onclick = function() {
	 	var div1 = document.getElementById('newpost1');
	    var div2 = document.getElementById('newpost2');
	    var div3 = document.getElementById('newpost3');
		var div4 = document.getElementById('newpost4');
		var div5 = document.getElementById('newpost8');
	    if (div1.style.display !== 'none') {
	        div1.style.display = 'none'
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	    else {
	        div1.style.display = 'block';
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	};

	//dropdown2
	var button2 = document.getElementById('button1');
	button2.onclick = function() {
	    var div1 = document.getElementById('newpost2');
	    var div2 = document.getElementById('newpost1');
	    var div3 = document.getElementById('newpost3');
		var div4 = document.getElementById('newpost4');
		var div5 = document.getElementById('newpost8');

	    if (div1.style.display !== 'none') {
	        div1.style.display = 'none'
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	    else {
	        div1.style.display = 'block';
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	};

	<?php if (isset($_SESSION['admin_loggedin'])){ ?>
	var button3 = document.getElementById('button2');
	button3.onclick = function() {
		var div1 = document.getElementById('newpost3');
	    var div2 = document.getElementById('newpost2');
	    var div3 = document.getElementById('newpost1');
		var div4 = document.getElementById('newpost4');
		var div5 = document.getElementById('newpost8');
	    if (div1.style.display !== 'none') {
	        div1.style.display = 'none'
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	    else {
	        div1.style.display = 'block';
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	}; <?php } ?>
	//dropdown4
	var button5 = document.getElementById('button4');

	button5.onclick = function() {
	 	var div1 = document.getElementById('newpost4');
	    var div2 = document.getElementById('newpost1');
	    var div3 = document.getElementById('newpost2');
		var div4 = document.getElementById('newpost3');
		var div5 = document.getElementById('newpost8');
	    if (div1.style.display !== 'none') {
	        div1.style.display = 'none'
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	    else {
	        div1.style.display = 'block';
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	}; 


	var button6 = document.getElementById('button5');

	button6.onclick = function() {
	 	var div1 = document.getElementById('newpost8');
	    var div2 = document.getElementById('newpost1');
	    var div3 = document.getElementById('newpost2');
		var div4 = document.getElementById('newpost3');
		var div5 = document.getElementById('newpost4');
	    if (div1.style.display !== 'none') {
	        div1.style.display = 'none'
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	    else {
	        div1.style.display = 'block';
	        div2.style.display = 'none';
	        div3.style.display = 'none';
			div4.style.display = 'none';
			div5.style.display = 'none';
	    }
	}; 
	function myFunction3() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil1");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function myFunction4() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil2");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {
		        title = cards[i].querySelector(".card-body h5.card-text");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function myFunction5() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil3");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {
		        title = cards[i].querySelector(".card-body h5.card-text");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function myFunction6() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil4");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItem");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {
		        title = cards[i].querySelector(".card-body h5.card-text");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function myFunction7() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil5");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItem");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {
		        title = cards[i].querySelector(".card-body h5.card-text");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function myFunction8() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil6");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItem");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {
		        title = cards[i].querySelector(".card-body h5.card-text");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}


	function filter1() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil4");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function filter2() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil5");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function filter3() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil6");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function filter4() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil7");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function filter5() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil8");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function filter6() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil9");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}

	function filter7() 
		{
		    var input, filter, cards, cardContainer, h5, title, i;
		    input = document.getElementById("fil10");
		    filter = input.value.toUpperCase();
		    cardContainer = document.getElementById("myItems");
		    cards = cardContainer.getElementsByClassName("card1");
		    for (i = 0; i < cards.length; i++) 
		    {

		        title = cards[i].querySelector(".card-body h5.card-text2");
		        if (title.innerText.toUpperCase().indexOf(filter) > -1) 
		        {
		            cards[i].style.display = "";
		        } else
		        {
		            cards[i].style.display = "none";
		        }
		    }
		}
</script>

</body>
</html>


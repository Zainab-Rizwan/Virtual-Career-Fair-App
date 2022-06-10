<?php
session_start();?>
<head> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>   

<?php include 'header.php';

include('db_connection.php');


$std_id = $_SESSION['std_id'];
$query = "SELECT * FROM registered_for_job WHERE std_id = '$std_id' ";
$result=mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);



?>
<body>


<section>
<div class="main">
  <!-- <h1><b>2021 Fall Career Fair</b></h1> -->
  
        <div class="card_image"><img src="imgs/jobb.jpg" width='150' height='150'></div>
        <div class="card_content">
          
          
          <p class="card_text">
            <div class="container" style="width:500px;">  
                
                <div class="table-responsive">  
                   <table class="table table-striped">  
                       
                <tr>
                  <th> Company Name </th>
                   <th> Recruiter Name </th>
                   <th> Fair Tiltle </th>
                   <th> Job Tiltle </th>
                   <th> Date </th>
                   <th> Time Slots </th>
                   <th> Join Meeting</th>
                 </tr>

                  <?php

                  if($row != 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                                  $job_id = $row["job_id"];
                                  // $rec_id = 0;
                                  // $fair_id = 0;
                                  $query1 = "SELECT * FROM jobs WHERE ID = '$job_id' ";
                                  $result1=mysqli_query($conn, $query1); 
                                  $row1 = mysqli_fetch_array($result1);

                                  if ($row1 != 0){
                                  $rec_id = $row1['rec_id'];
                                  $fair_id = $row1['fair_id'];
                                  $query3= "SELECT * FROM fairs WHERE ID = '$fair_id' ";
                                  $result3=mysqli_query($conn, $query3); 
                                  $row3 = mysqli_fetch_array($result3);
                                  
                                  $today= date("Y-m-d");
                                  $bool1="true";
				 	                      	$cond1=($row3["date"]==$today);
                                  
                                  if ($row3 != 0){
                                  $query2= "SELECT * FROM recruiter_signup2 WHERE ID = '$rec_id' ";
                                  $result2=mysqli_query($conn, $query2); 
                                  $row2 = mysqli_fetch_array($result2);
                                  if ($row2 != 0){
                                  
                                  $query54="SELECT * from token  where rec_id='$rec_id' and fair_id='$fair_id' and job_id='$job_id'"; 
                                  $result54=mysqli_query($conn, $query54); 
                                  $row54 = mysqli_fetch_array($result54);
                                  if ($row54 != 0){
                                  $token_id = $row54['id'];}
                                  
                           ?> 
                          <tr>  
                               <td><?php echo $row2["com_name"];?></td>  
                               <td><?php echo $row2["rec_name"]; ?></td>  
                               <td><?php echo $row3["title"]; ?></td>  
                               <td><?php echo $row1["job_title"];?></td>  
                               <td><?php echo $row3["date"]; ?></td>  
                               <td><?php echo $row["time_slot"]; ?></td> 
                               <?php if ($row54 !=0 and $cond1==$bool1){ ?>
                               <td>  <button class="btn card_btn" onclick ="window.location.href='video_call_std.php?token=<?php echo $token_id?>'">Join</button> <td>
                          </tr>  
                          <?php  
                               } } }
                          }  }}
                          ?>  
                     </table>  
                </div>  
           </div>  

			</p> <br>  
        
        </div>
      </div>
    </li>
    <!-- <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="imgs/companies/Ali_arshad_400x300.png"></div>
        <div class="card_content">
          <p class="card_text">Company Name: <?php echo $row ['com_name'];?><br>
			Recruiter:<?php echo $row ['rec_name']; ?> <br>
			Slot: <?php echo $row ['time_slot']; ?><br>
      </p> <br>  
          <button class="btn card_btn" onclick ="window.location.href='pre_meeting.php'">Join</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="imgs/companies/northbay_2_400x300.png"></div>
        <div class="card_content">
         <p class="card_text">Company Name: <?php echo $row ['com_name'];?><br>
      Recruiter:<?php echo $row ['rec_name']; ?> <br>
      Slot: <?php echo $row ['time_slot']; ?><br>
      </p> <br>  
         <button class="btn card_btn" onclick ="window.location.href='pre_meeting.php'">Join</button>
        </div>
      </div>
    </li>
    <li class="cards_item">
      
    </li>
    
  </ul>
</div>-->
</section> 

</body>



<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

/* Design */
*,
*::before,
*::after {
  box-sizing: border-box;
}

html {
  background-color: #ecf9ff;
}

body {
  color: #272727;
  font-family: 'Quicksand', serif;
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
  padding: 1rem;
}

.main{
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
    font-size: 34px;
    font-weight: 400;
    text-align: center;
}

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;

}

.btn {
  color: #fff;
	
  padding: 0.8rem;
  font-size: 14px;
  text-transform: uppercase;
  border-radius: 4px;
  font-weight: 400;
  display: block;
  width: 100%;
  cursor: pointer;
  border: 1px solid #968F8F;
  background: #003366;
}

.btn:hover {
  background-color: #BDBBBB;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards_item {
  display: flex;
  padding: 1rem;
}

@media (min-width: 40rem) {
  .cards_item {
    width: 50%;
  }
}

@media (min-width: 56rem) {
  .cards_item {
    width: 33.3333%;
  }
}
/*
.card {
  background-color: white;
  border-radius: 0.45rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.35);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}*/

.card_content {
  padding: 1rem;
  background: white;
	
}
	


.card_text {
  color: #000;
  font-size: 1.4rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;    
  font-weight: 400;
	
	
}
</style>

<!-- Footer -->
	<?php include 'footer.php';?>  

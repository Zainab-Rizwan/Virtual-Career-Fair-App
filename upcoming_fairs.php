<?php
session_start();
?>
<title>Upcoming Fairs</title>
<?php require "header.php";?>
<h1 style="text-align: center !important; margin: 2em; color:white; background-color:#003366;">Upcoming Career Fairs</h1>
	  <div style="text-align: center">
    <a href="fair_display.php" class="upcoming-btn">All Fairs</a>
	  <a href="upcoming_fairs.php" class="upcoming-btn">Upcoming Fairs</a>
	  <a href="past_fairs.php" class="past-btn">Past Fairs</a>
         <a href="live-fairs.php" class="upcoming-btn">Live Fairs</a>


    <style>
/* a {
  text-decoration: none;
  display: inline-block;
  padding: 12px 18px;
  
} */

/* a:hover {
  background-color: #ddd;
  color: black;
} */

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #f1f1f1;
  color: black;

}

.round {
  border-radius: 50%;
}
.event-container {
  font-family: "Roboto", sans-serif;
  max-width: 800px;
  margin: 0 auto;
}
.upcoming-btn {
	
	display: inline-block;
	text-decoration: none;
	color: #000;
	border: 2.5px solid #000;
	padding: 12px 34px;
	font-size: 10px;
	background: transparent ;
	position: relative;
	cursor: pointer;
	border-radius: 20px;
	justify-content: center;
	margin: 1px 380px;
	
}
.past-btn {
	
	display: inline-block;
	text-decoration: none;
	color: #000;
	border: 2.5px solid #000;
	padding: 12px 34px;
	font-size: 10px;
	background: transparent ;
	position: relative;
	cursor: pointer;
	border-radius: 20px;
		margin: 10px -220px;
	
}
.event-container .event {
  box-shadow: 0 4px 16px -8px rgba(0, 0, 0, 0.4);
  display: flex;
  border-radius: 8px;
  margin: 32px 0;
}

.event .event-left {
  background: #003366;
  min-width: 82px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #eeee;
  padding: 8px 48px;
  font-weight: bold;
  text-align: center;
  border-radius: 8px 0 0 8px;
}



.event .event-right {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 24px;
}

.event .event-right h3.event-title {
  height: 2em;
  text-align: center; 
  font-size: 24px;
  margin: 24px 0 10px 0;
  color: #4165ad;
  text-transform: uppercase;

}
.event .event-left .date {
  font-size: 20px;
  color: white;
}

.event .event-left .month {
  font-size: 16px;
  font-weight: normal;
}

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

  a:hover .button {
      background-color: #fff;
      border-color:#003366;
      border:2px;
      color: #5C8DEF;
      text-decoration: none !important;
      border-style: solid;
  }
  .upcoming-btn {

padding: 1em 2.1em 1.1em;
border-radius: 3px;
margin: 8px 8px 8px 8px;
color: black;
background-color: #fbdedb;
display: inline-block;
background: white;
-webkit-transition: 0.3s;
-moz-transition: 0.3s;
-o-transition: 0.3s;
transition: 0.3s;
font-family: sans-serif;
font-weight: 800;
font-size: .85em;
text-transform: uppercase;
text-align: center;
text-decoration: none;
-webkit-box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
position: relative;
}


.past-btn {

padding: 1em 2.1em 1.1em;
border-radius: 3px;
margin: 8px 8px 8px 8px;
color: black;
background-color: #fbdedb;
display: inline-block;
background: white;
-webkit-transition: 0.3s;
-moz-transition: 0.3s;
-o-transition: 0.3s;
transition: 0.3s;
font-family: sans-serif;
font-weight: 800;
font-size: .85em;
text-transform: uppercase;
text-align: center;
text-decoration: none;
-webkit-box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
position: relative;
}


</style>

<?php
include('db_connection.php');
$query="select * from fairs"; 
$result=mysqli_query($conn, $query); 
?>
<?php
$sql = "SELECT * FROM fairs WHERE date > CURDATE() ORDER BY date";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) { 
  $id = $row['ID'];
  $date=$row['date'];
  $day = date('l', strtotime($date)); 
  $da = date('jS',strtotime($date)); 
  $m = date('F',strtotime($date)); 
  $y = date('Y',strtotime($date)); ?>
    <div class="event-container">
      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date"><?php
              echo $day.", ".$da." ".$m.", ".$y;
              ?>
            </div>      
          </div>
        </div>
		  
          
        <div class="event-right">
          <h3 class="event-title"><?php echo $row['title']; ?></h3>
            </div>
               
          <div class="event-description">    

          <button class="button" onclick ="window.location.href='Fair details.php?fair_id=<?php echo $id; ?>'">
                <span class="button__text" style = 'color:#ffffff; text-align:centre;'>View Details</span>
                <span class="button__icon" >
                  <ion-icon name="eye-outline" style = 'color:#ffffff;'></ion-icon>
                </span>
          </button>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
          </div>
      
      </div>
</div>
<?php } ?>	
<div style="text-align: center">
<a href="javascript:history.back()" class="previous round">&#8249;</a>
<a href="#" class="next round">&#8250;</a>

</div>
</script>

 <?php require "footer.php";?>
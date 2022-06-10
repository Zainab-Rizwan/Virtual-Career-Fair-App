<?php
session_start();
require_once('db_connection.php');
//  include "header.php" ;
?>
<!DOCTYPE html>
<html>
<head>
      
	  <title> Message </title>
	  <meta name="viewport" content="width-device-width , initial_scale=1">
	  
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1f077d0750.js" crossorigin="anonymous"></script>
   
</head>
	<body>
	<?php include_once "header.php" ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Notification</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    date_default_timezone_set('Asia/Karachi');
    $time=date("h:i:s.000000");
    $date =date("Y-m-d");
    
    $sql_get3=mysqli_query($conn, "SELECT * from fairs ");
    
    if(mysqli_num_rows($sql_get3)>0)
    {
        while($result=mysqli_fetch_array($sql_get3))
        {
            $date1= $result['date'];
            $time1= $result['start_time'];
            if($date==$date1 && $time==date("h:i:s.000000"))
            {
              $sql_insert=mysqli_query($conn,"UPDATE fairs SET equaltime='Career Fair is about to start' where date='$date1' and status=0");

            }
        }
            
    
    }
    
    if (isset($_SESSION['std_loggedin'])){
      $sid = $_SESSION['std_id'];
    }
    $sql_get=mysqli_query($conn,"SELECT * FROM std_req where readstatus=0 and std_id=$sid");
    $count1=mysqli_num_rows($sql_get);
    $sql_insert1=mysqli_query($conn,"SELECT * FROM fairs where status=0 and date='$date1'");
    $count2=mysqli_num_rows($sql_insert1) ;
    $count= $count1+$count2 ;
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-envelope"></i> <span class="badge bg-primary" id="count"><?php echo $count ?></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if (isset($_SESSION['std_loggedin'])){
                $sid = $_SESSION['std_id'];
              }
              $sql_insert2=mysqli_query($conn,"SELECT * FROM fairs where status=0 and date='$date1'");
              $sql_get1=mysqli_query($conn,"SELECT * FROM std_req where readstatus=0 and std_id=$sid");
              
              
              if(mysqli_num_rows($sql_get)>0 or mysqli_num_rows($sql_insert1)>0  )
              {
                
                while(mysqli_fetch_array($sql_get1) or mysqli_fetch_array($sql_insert2))
                {
                  $result=mysqli_fetch_array($sql_get1);
                  echo '<a>',$result["message"],'</a>'."<br>";
                  
                  $result1= mysqli_fetch_array($sql_insert2);
                  echo '<a>',$result1["equaltime"],'</a>';
                  echo '<div class="dropdown-divider"></div>';
                  $sql_update=mysqli_query($conn,"UPDATE std_req SET readstatus=1 and std_id=$sid");
                  $sql_update1=mysqli_query($conn,"UPDATE fairs SET status=1 and date='$date1'");
                }

                

              }
              else
              {
                echo '<a class="dropdown-item text-danger font-weight-bold" herf="a"><i class="fas fa-from-open"></i> Sorry! No Messages</a>';

              }

            
            ?>
          </ul>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
     
	<?php include_once "footer.php" ?>	
    </body>
</html>
<style>
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
#count
{
    border-radius:50%;
    position:relative;
    top: -10px;
    left:-10px;
}

</style>
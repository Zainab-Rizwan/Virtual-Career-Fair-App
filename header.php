<?php 
require_once('db_connection.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/index.css?<?php echo time(); ?>" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>
		
<div>
    <div class="top-bar">
     ----
    </div>
    <nav>
        <div class="logo">
            <img src="uetlogo.png" alt="Logo Image">
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
			<li><a href="fair_display.php">Career Fair Calendar</a></li>
            <!-- <li><a href="index.php">Contact Us</a></li> -->
            
            <?php
            if(isset($_SESSION['rec_loggedin'] )){
                echo "<li><a href='rec_portal.php'>Dashboard</a></li>";
                $rid = $_SESSION['rec_id'];
                
                // $sql = ;
                $sql_get=mysqli_query($conn,"SELECT * FROM rec_req where readstatus=0 and rec_id=$rid and status = 'approved'");
                $count=mysqli_num_rows($sql_get);
                


                echo "<div class='dropdown'>
                <button class='dropbtn'>
                <img src='message.JPG' width='10' height='10'
                id='count'/>$count<i class='fa fa-caret-down'></i></button>
                <div class='dropdown-content'> ";
                $sql_get1=mysqli_query($conn,"SELECT * FROM rec_req where readstatus=0 and rec_id=$rid and status = 'approved'");
              if(mysqli_num_rows($sql_get)>0)
              {
                while($result=mysqli_fetch_array($sql_get1))
                {
                  echo '<a>',$result["message"],'</a>';
                  echo '<div class="dropdown-divider"></div>';
                  $sql_update=mysqli_query($conn,"UPDATE rec_req SET readstatus=1 and rec_id=$rid and status = 'approved'");
                }

              }
              else
              {
                echo '<a class="dropdown-item text-danger font-weight-bold" herf="a"><i class="fas fa-from-open"></i>No Messages!</a>';

              }

                echo"  </div>
              </div>";

                echo '<div class="dropdown">
                <button class="dropbtn">'.$_SESSION['rec_name'].'
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="update_pass_rec.php">Change Password</a>
                <a href="deleterec_frontend.php">Delete Account</a>
                <a href="reviews.php">Feedback</a>
                <a href="rec_logout.php">Logout</a>
                </div>
               </div>';
                }
            else if(isset($_SESSION['admin_loggedin'] )){
            echo "<li><a href='create_fairs.php'>Create Fair</a></li>";
            echo "<li><a href='admin_portal.php'>Dashboard</a></li>";
            echo '<div class="dropdown">
            <button class="dropbtn">FAIR REQUESTS
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="rec_requests.php">Recruiter Requests</a>
            <a href="std_requests.php">Student Requests</a>
            </div>
           </div>';
            
            echo '<div class="dropdown">
            <button class="dropbtn">'.$_SESSION['admin_name'].'
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="admin_signup.php">Add Admin</a>
            <a href="show_rec_std.php">View Users</a>
            <a href="update_pass_admin.php">Change Password</a>
            <a href="deleteadmin_frontend.php">Delete Account</a>
            <a href="admin_logout.php">Logout</a>
            </div>
           </div>';
            } 
            else if(isset($_SESSION['std_loggedin'] )){
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
                $sql_get=mysqli_query($conn,"SELECT * FROM std_req where readstatus=0 and std_id='$sid' and status = 'approved'");
                $count1=mysqli_num_rows($sql_get);
                $sql_insert1=mysqli_query($conn,"SELECT * FROM fairs where status=0 and date='$date1'");
                $count2=mysqli_num_rows($sql_insert1) ;
                $count= $count1+$count2 ;
                echo "<li><a href='join_meeting.php'>My Interviews</a></li>";
                echo "<li><a href='std_portal.php'>Dashboard</a></li>";
                
            
                echo "<div class='dropdown'>
                <button class='dropbtn'>
                <img src='message.JPG' width='10' height='10'
                id='count'/>$count<i class='fa fa-caret-down'></i></button>
                <div class='dropdown-content'> ";
                if (isset($_SESSION['std_loggedin'])){
                  $sid = $_SESSION['std_id'];
                }
                $sql_insert2=mysqli_query($conn,"SELECT * FROM fairs where status=0 and date='$date1'");
                $sql_get1=mysqli_query($conn,"SELECT * FROM std_req where readstatus=0 and std_id='$sid' and status = 'approved'");
                
                
                if(mysqli_num_rows($sql_get)>0 or mysqli_num_rows($sql_insert1)>0  )
                {
                  
                  while(mysqli_fetch_array($sql_get1) or mysqli_fetch_array($sql_insert2))
                  {
                    if(mysqli_num_rows($sql_get)>0){
                    $result=mysqli_fetch_array($sql_get1);
                    echo '<a>',"Your request to join fair has been accepted",'</a>'."<br>";}
                    if(mysqli_num_rows($sql_insert1)>0 ){
                    $result1= mysqli_fetch_array($sql_insert2);
                    echo '<a>',"Career fair is about to start",'</a>';}
                    echo '<div class="dropdown-divider"></div>';
                    $sql_update=mysqli_query($conn,"UPDATE std_req SET readstatus=1 and std_id=$sid");
                    $sql_update1=mysqli_query($conn,"UPDATE fairs SET status=1 and date='$date1'");
                  }
  
                  
  
                }
                else
                {
                  echo '<a class="dropdown-item text-danger font-weight-bold" herf="a"><i class="fas fa-from-open"></i> No Messages</a>';
  
                }
            echo"  </div>
              </div>";
                
               
                echo '<div class="dropdown">
                
                <button class="dropbtn">'.$_SESSION['std_name'].'
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="update_pass_std.php">Change Password</a>
                <a href="deletestd_frontend.php">Delete Account</a>
                <a href="reviews.php">Feedback</a>
                <a href="std_logout.php">Logout</a>
                </div>
               </div>';
                }
           else{ ?>
                <li><button  class="login-button" onclick ="window.location.href='login.php'">Login</button></li>        
                <div class="dropdown">
                  <button class="dropbtn">Signup
                  <i class="fa fa-caret-down"></i>
                  </button>
                 <div class="dropdown-content">
                 <a href="rec_signup.php">Recruiter</a>
                 <a href="std_signup1.php">Student</a>
                 </div>
                </div>
        <?php } ?>
            
        </ul>
    </nav>
</body>
	
	

</html>
	
<style>




*{
    margin: 0;
    padding: 0;
    color: #000000;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}

.top-bar {
  text-align:right;
		color: navy;
		background-color: navy;
		
}

body{
    overflow-x: hidden;
}
nav{
    height: 6rem;
    width: 100vw;
    background-color: #fff;
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
    display: flex;
    position: relative;
    z-index: 10;
}
	
/*Styling logo*/
.logo{
    padding:1vh 1vw;
    text-align: center;
}
.logo img {
    height: 5rem;
    width: 5rem;
}

/*Styling Links*/
.nav-links{
    display: flex;
    list-style: none; 
    width: 88vw;
    padding: 0 0.7vw;
    align-items: center;
    text-transform: uppercase;
	padding-right: 30px;
	justify-content: right;
	
}
.nav-links li a{
    text-decoration: none;
    margin: 0 0.7vw;
	text-align: right;
	color: #000;
	font-size: 12px;
	
		
}
.nav-links li a:hover {
    color: #0B0F3D;
}
.nav-links li {
    position: relative;
	padding-right: 40px;
	text-align: center;
	float: right;
}

	.nav-links li a::after{
	content: "";
	width:0%;
	height: 3px;
	background: #ffcb78;
	display: block;
	transition: 0.5s;
	position:absolute;
	margin: 0 0 0 10%;
}

.nav-links li a:hover::after{
	
	width: 55%;
}

/*Styling Buttons*/
.login-button{
    background-color: transparent;
    border: 1.5px solid #000;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    margin-left: 2vw;
    font-size: 1.2rem;
    cursor: pointer;
	color: #000;

}
.login-button:hover {
    color: #131418;
    background-color: #f2f5f7;
    border:1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}

.dropdown {
  float: left;
}

/* Dropdown button */
.dropdown .dropbtn {
  color: #131418;
    background-color: white;
    border: 1.5px solid #000;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    font-size: 1.2rem;
    font-family: inherit;
    cursor: pointer;
    margin-right:20px;

    
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
    color: #131418;
    background-color: #f2f5f7;
    border:1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none; 
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 10px 10px;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
.join-button{
    color: #131418;
    background-color: #61DAFB;
    border: 1.5px solid #000;
    border-radius: 2em;
    padding: 0.6rem 0.8rem;
    font-size: 1.2rem;
    cursor: pointer;
}
.join-button:hover {
    color: #f2f5f7;
    background-color: transparent;
    border:1.5px solid #f2f5f7;
    transition: all ease-in-out 350ms;
}

/*Styling Hamburger Icon*/
.hamburger div{
    width: 30px;
    height:3px;
    background: #000;
    margin: 5px;
    transition: all 0.3s ease;
}
.hamburger{
    display: none;
}

/*Stying for small screens*/
@media screen and (max-width:900px){
    nav{
        position: absolute;
        z-index: 3;
    }
	
    .hamburger{
        display:block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }
    .nav-links{
        position: fixed;
        background: #FFFFFF;
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
		line-height: 30px;
		
		
    }
    .nav-links.open{
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
    }
    .nav-links li{
        opacity: 0;
    }
    .nav-links li:nth-child(1){
        transition: all 0.5s ease 0.2s;
    }
    .nav-links li:nth-child(2){
        transition: all 0.5s ease 0.4s;
    }
    .nav-links li:nth-child(3){
        transition: all 0.5s ease 0.6s;
    }
    .nav-links li:nth-child(4){
        transition: all 0.5s ease 0.7s;
    }
    .nav-links li:nth-child(5){
        transition: all 0.5s ease 0.8s;
    }
    .nav-links li:nth-child(6){
        transition: all 0.5s ease 0.9s;
        margin: 0;
    }
    .nav-links li:nth-child(7){
        transition: all 0.5s ease 1s;
        margin: 0;
    }
    li.fade{
        opacity: 1;
    }
}
/*Animating Hamburger Icon on Click*/
.toggle .line1{
    transform: rotate(-45deg) translate(-5px,6px);
}
.toggle .line2{
    transition: all 0.7s ease;
    width:0;
}
.toggle .line3{
    transform: rotate(45deg) translate(-5px,-6px);
}

	
	</style>
	
<script>
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});
	</script>
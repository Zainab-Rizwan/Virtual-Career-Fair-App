<?php
session_start();
require_once('db_connection.php');    
$std_id = $_SESSION['std_id'];

       $sql= "SELECT * FROM student_signup WHERE ID ='$std_id'";
       $result = mysqli_query($conn, $sql);
       $row=mysqli_fetch_array($result);
    
       $profile_image = $row["images"];
       /* echo $profile_image;
      echo $row["images"]; */
 /*      echo '<img src="data:image/jpeg;base64,'.base64_encode($row['images']).'"/>';
      echo '<img src="data:image/jpeg;base64,'.base64_encode($image->load()) .'" />'; */

/* 
       $name = $row['name'];
       $name = $row['name'];
       $email = $row['email'] ;
       $phone = $row['phone_no'] ;
       $profession = $row['degree_type'];
       
       echo $email;
       echo $name;
       echo $phone; */
/* 
       echo $email;
       echo $profession;

       $first_name =$_GET['first_name'];
       $last_name =$_GET['last_name'];
       $email=$_GET['email'];
       $phone = $_GET['phone'];
       $profession = $_GET['profession'];
       $profile_image = $_GET['profile_image'];

       $id = $_GET["email"];
       echo $id; */

  define('Token','HGsZOXpfNC');
  $skills = [];
  $skill_levels = [];
  // $hobbies = [];
  $institutes = [];
  $degrees = [];
  $froms = [];
  $tos = [];
  $grades = [];
  $titles = [];
  $descriptions = [];
  if(Token == $_POST['token'])
  {

    $about_me = $_POST['about_me'];
    array_push($skills,$_POST['skill1']);
    array_push($skill_levels,intval($_POST['skill_level1']));
  

    array_push($institutes,$_POST['institute1']);
    array_push($degrees,$_POST['degree1']);
    array_push($froms,$_POST['from1']);
    array_push($tos,$_POST['to1']);
    array_push($grades,$_POST['grade1']);
    array_push($titles,$_POST['title1']);
    array_push($descriptions,$_POST['description1']);

    if(isset($_POST['skill2']) && !empty($_POST['skill2']))
    {
      if(isset($_POST['skill_level2']) && !empty($_POST['skill_level2']))
      {
        array_push($skills,$_POST['skill2']);
        array_push($skill_levels,intval($_POST['skill_level2']));
      }
    }
    if(isset($_POST['skill3']) && !empty($_POST['skill3']))
    {
      if(isset($_POST['skill_level3']) && !empty($_POST['skill_level3']))
      {
        array_push($skills,$_POST['skill3']);
        array_push($skill_levels,intval($_POST['skill_level3']));
      }
    }
    if(isset($_POST['skill4']) && !empty($_POST['skill4']))
    {
      if(isset($_POST['skill_level4']) && !empty($_POST['skill_level4']))
      {
        array_push($skills,$_POST['skill4']);
        array_push($skill_levels,intval($_POST['skill_level4']));
      }
    }
    if(isset($_POST['skill5']) && !empty($_POST['skill5']))
    {
      if(isset($_POST['skill_level5']) && !empty($_POST['skill_level5']))
      {
        array_push($skills,$_POST['skill5']);
        array_push($skill_levels,intval($_POST['skill_level5']));
      }
    }

    if(isset($_POST['institute2']) && !empty($_POST['institute2']))
    {
      if(isset($_POST['degree2']) && !empty($_POST['degree2']))
      {
        if(isset($_POST['from2']) && !empty($_POST['from2']))
        {
          if(isset($_POST['to2']) && !empty($_POST['to2']))
          {
            if(isset($_POST['grade2']) && !empty($_POST['grade2']))
            {
              array_push($institutes,$_POST['institute2']);
              array_push($degrees,$_POST['degree2']);
              array_push($froms,$_POST['from2']);
              array_push($tos,$_POST['to2']);
              array_push($grades,$_POST['grade2']);
            }
          }
        } 
      }
    }
    if(isset($_POST['institute3']) && !empty($_POST['institute3']))
    {
      if(isset($_POST['degree3']) && !empty($_POST['degree3']))
      {
        if(isset($_POST['from3']) && !empty($_POST['from3']))
        {
          if(isset($_POST['to3']) && !empty($_POST['to3']))
          {
            if(isset($_POST['grade3']) && !empty($_POST['grade3']))
            {
              array_push($institutes,$_POST['institute3']);
              array_push($degrees,$_POST['degree3']);
              array_push($froms,$_POST['from3']);
              array_push($tos,$_POST['to3']);
              array_push($grades,$_POST['grade3']);
            }
          }
        } 
      }
    }
    if(isset($_POST['title2']) && !empty($_POST['title2']))
    {
      if(isset($_POST['description2']) && !empty($_POST['description2']))
      {
        array_push($titles,$_POST['title2']);
        array_push($descriptions,$_POST['description2']);
      }
    }
    if(isset($_POST['title3']) && !empty($_POST['title3']))
    {
      if(isset($_POST['description3']) && !empty($_POST['description3']))
      {
        array_push($titles,$_POST['title3']);
        array_push($descriptions,$_POST['description3']);
      }
    }
  }
  else
  {
    header('location: vcfa/cv2.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" ></script>
  
  <title><?php echo ucwords($row['name']). ' Resume'; ?></title>
</head>
<body>
<body style="background-color: #F7F7F7;">
    <div id="backgroundimage">
      <div>

    <?php include_once "header.php" ?>
</div>
     
  <div class="btn-col">
          <button type="button" id="downloadButton" 
          class="btn btn-primary form-control fa fa-download" 
            onclick="javascript:generatePDF()"> Download CV</button>
    

    <script>
        async function generatePDF() {
            document.getElementById("downloadButton").innerHTML = "Currently downloading, please wait";

            //Downloading
            var downloading = document.getElementById("whatToPrint");
            var doc = new jsPDF('p', 'mm', 'a4');

            await html2canvas(downloading, {
                //allowTaint: true,
                //useCORS: true,
      
                
            }).then((canvas) => {
                //Canvas (convert to PNG)
                width: 200
                height: 300

                doc.addImage(canvas.toDataURL("image/png"), 'PNG', 5, 5, 200, 290);
            })

            doc.save("CV.pdf");

            //End of downloading

            document.getElementById("downloadButton").innerHTML = "Click to download";
        }
    </script>
  
</div>
<div class="grid-container"  id="whatToPrint" >
  <div class="zone-1" >
    <div class="toCenter">

    <img src="<?php echo "std_profiles/".$row['images']; ?>"  class="profile">
    
    </div>
    <div class="contact-box"  >
      <div class="title" >
        <h2>Contact</h2>
      </div>
      <div class="call"><i class="fas fa-phone-alt"></i>
        <div class="text"><?php echo $row['phone_no'];?></div>
      </div>
      <div class="email"><i class="fas fa-envelope"></i>
        <div class="text"><?php echo $row['email'];?></div>
      </div>
    </div>
    <div class="personal-box" id = "htmlContent">
      <div class="title">
        <h2 >Skills</h2>
      </div>
      <?php 
      for($j=0; $j<count($skills); $j++){
          echo "<div class='skill-1'>
                  <p><strong>" . strtoupper($skills[$j]) . "</strong></p>
                  <div class='progress'>";
            for($i=0;$i<$skill_levels[$j];$i++){
              echo '<div class="fas fa-star active"></div>';
              
            }
            echo '</div></div>';

          }
      ?>
    </div>
        </div>
  <div class="zone-2">
    <div class="headTitle">
      <h1><?php echo ucwords($row['name']);?><br></h1>
    </div>
    <div class="subTitle">
      <h1><?php echo ucwords($row['degree_title']);?><h1>
    </div>
    <div class="group-1">
      <div class="title">
        <div class="box">
          <h2 style="color: #ffffff;" >About Me</h2>
        </div>
      </div>
      <div class="desc"><?php echo $about_me;?></div>
    </div>
    <div class="group-2">
      <div class="title">
        <div class="box">
          <h2 style="color: #ffffff;" >Education</h2>
        </div>
      </div>
      <div class="desc">
        <?php 
          for($i=0; $i<count($institutes);$i++)
          {
            echo "<ul>
            <li>
              <div class='msg-1'>" . $froms[$i] . " to " . $tos[$i]. " | " . ucwords($degrees[$i]) . ", " . $grades[$i]. "</div>
              <div class='msg-2'>" . ucwords($institutes[$i]) . "</div>
            </li>
          </ul>";
          }
        ?>
      </div>
    </div>
    <div class="group-3">
      <div class="title">
        <div class="box">
          <h2 style="color: #ffffff;" >Experience</h2>
        </div>
      </div>
      <div class="desc">
      <?php 
          for($i=0; $i<count($titles);$i++)
          {
            echo "<ul>
            <li>
              <div class='msg-1'><br></div>
              <div class='msg-2'>" . ucwords($titles[$i]) ."</div>
              <div class='msg-3'>" . ucfirst($descriptions[$i]) . "</div>
            </li>
          </ul>";
          }
        ?>
      </div>
   
      
    </div>
    </div> 
  </div>

<?php include_once "footer.php" ?>
        </div>
</body>
</html>
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap");
@media print {
  @page {
    margin: 0;
    size: A4;
  }
  * {
    -webkit-print-color-adjust: exact;
  }
}
* {
  font-family: "Montserrat", sans-serif;
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  
}
.form-container
{
    max-width: 768px;
    margin: 10px auto;
    padding: 30px;
    border: 1px solid black;
}
body {
  background: #5f6368;
}

.toCenter {
  width: 100%;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}
.grid-container {
  margin: auto;
  display: grid;
  grid-template-columns: 0.33fr 1fr;
  width: 200mm;
  height: 300mm;
  overflow: hidden;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);
}
.grid-container .zone-1 {
  padding: 40px 20px;
  padding-left: 35px;
  background: #d9d9d9;
  width: 100%;
  color: #313131;
}
.grid-container .zone-1 .profile {
  display: inline-flex;
  margin-bottom: 5px;
  margin-left: -15px;
  width: 220px;
  height: 220px;
  border-radius: 50mm;
  /* background-image: url("https://image.freepik.com/free-photo/waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer_273609-16320.jpg"); */
  background-position: center top;
  background-size: 200%;
  border: 4px solid black;
}
.grid-container .zone-1 .contact-box {
  margin-top: 10px;
}
.grid-container .zone-1 .contact-box > * {
  width: 100%;
  display: grid;
  grid-template-columns: 0.3fr 1fr;
  margin-top: 25px;
  align-items: center;
}
.grid-container .zone-1 .contact-box > * i {
  font-size: 1.3em;
}
.grid-container .zone-1 .contact-box > * .text {
  display: inline-flex;
  word-break: break-all;
}
.grid-container .zone-1 .personal-box {
  margin-top: 35px;
}
.grid-container .zone-1 .personal-box > *:not(.title) {
  margin: 25px 0px;
  grid-template-columns: 0.55fr 1fr;
  display: grid;
}
.grid-container .zone-1 .personal-box .progress .dot {
  display: inline-block;
  width: 10px;
  height: 10px;
  background-color: #313131;
  border-radius: 50%;
  margin-left: 4px;
}
.margin-20
{
  margin-left: 20px;
  margin-bottom: 10px;
  /* vertical-align: baseline; */
}
li::marker
{
  /* margin-left: 20px; */
 font-size: 2rem;
  color: #003366;
}
.d-flex
{
  display: flex;
}
.align-items-center
{
  align-items: center;
  padding-top: 1rem;
}
.circle
{
  display: block;
  width: 10px;
  height: 10px;
  background-color: #003366;
  border-radius: 50%;
  margin-right: 10px;
}
.grid-container .zone-1 .personal-box .progress .fa-star.active {
  color: #003366;
  margin-right: 5px;
}
/* .grid-container .zone-1 .hobbies-box {
  margin-top: 35px;
}
.grid-container .zone-1 .hobbies-box .logo {
  margin: 10px 0px;
  display: grid;
  grid-template: 1fr 1fr/1fr 1fr;
  font-size: 2.8em; 
  grid-row-gap: 15px;
} */
.grid-container .zone-2 {
  background: #EDEDED;
  padding: 40px 20px;
  padding-right: 75px;
  color: black;
}
.grid-container .zone-2 .headTitle {
  font-size: 2.1em;
  color: #003366;
}
.grid-container .zone-2 .headTitle h1 {
  font-weight: 400 !important;
}
.grid-container .zone-2 .subTitle h1 {
  font-weight: 400 !important;
}
.grid-container .zone-2 .box {
  display: inline-block;
  padding: 2px 70px 2px 20px;
  margin-left: -20px;
  margin-top: 35px;
  background: #003366;
  color: black;
}
.grid-container .zone-2 .group-1 .desc {
  margin-top: 15px;
  line-height: 1.5;
}
.grid-container .zone-2 .group-2 .desc {
  margin-top: 15px;
  margin-left: 20px;
}
.grid-container .zone-2 .group-2 .desc ul {
  position: relative;
  margin-top: 20px;
  margin-left: 5px;
}
.grid-container .zone-2 .group-2 .desc ul:before {
  content: "";
  position: absolute;
  top: 12px;
  left: -22px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #003366;
}
.grid-container .zone-2 .group-2 .desc ul li {
  list-style-type: none;
  position: relative;
}
.grid-container .zone-2 .group-2 .desc ul li:before {
  content: "";
  position: absolute;
  top: 12px;
  left: -18px;
  height: 60px;
  border-left: 2px solid #003366;
}
.grid-container .zone-2 .group-2 .desc ul:last-of-type li:before {
  content: none;
}
.grid-container .zone-2 .group-2 .desc ul li div:last-of-type {
  color: #003366;
  font-weight: bold;
}
.grid-container .zone-2 .group-3 .desc {
  margin-top: 15px;
  margin-left: 20px;
}
.grid-container .zone-2 .group-3 .desc ul {
  position: relative;
  margin-top: 20px;
  margin-left: 5px;
}
.grid-container .zone-2 .group-3 .desc ul:before {
  content: "";
  position: absolute;
  top: 30px;
  left: -22px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #003366;
}
.grid-container .zone-2 .group-3 .desc ul li {
  list-style-type: none;
  position: relative;
}
.grid-container .zone-2 .group-3 .desc ul li:before {
  content: "";
  position: absolute;
  top: 30px;
  left: -18px;
  height: 100px;
  border-left: 2px solid #003366;
}
.grid-container .zone-2 .group-3 .desc ul:last-of-type li:before {
  content: none;
}
.grid-container .zone-2 .group-3 .desc ul li div:nth-child(2) {
  color: #003366;
  font-weight: bold;
}
.btn {
  width: 200mm;
	
	text-align: center;
  
  margin-top: 30px;
  position: relative;
  
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.btn-primary {
    color: #fff;
    background-color: #00007C;
    border: none;
  display: flex;
  justify-content: center;
  align-items: center;
  
}
.btn-primary:hover {
    color: #fff;
    background-color: grey;
    border: none;
}
.btn:hover {
    color: fff;
    border: none;
}
@media( max-width: 800) {
  .btn-col{
 
    width: 100mm;
	
	text-align: center;
  
  margin-top: 30px;
  position: relative;
  
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  }

}
</style>

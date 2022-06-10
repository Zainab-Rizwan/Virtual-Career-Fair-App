<?php
session_start();

require_once('db_connection.php');    

    $std_id = $_SESSION['std_id'];
    // echo $std_id;

       $sql= "SELECT * FROM student_signup WHERE ID =$std_id";
       $result = mysqli_query($conn, $sql);
       $row=mysqli_fetch_array($result);

/*        $name = $_SESSION['name'];

       echo $name;
       echo $name;
       echo $name;

       

       
       $name = $row['name'];
       $name = $row['name'];
       $email = $row['email'] ;
       $phone = $row['phone_no'] ;
       $profession = $row['degree_type'];
       $profile_image = $row["images"];

       
       echo $name;
       echo $name;
       echo $email;
       echo $phone;
       echo $profession;
       echo $profile_image; */

/*        $id = $_GET["email"];
       
       echo $id;
 */
$_SESSION['std_id'] = $std_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_cv.css"> 
</head>
<body style="background-color: #F7F7F7;">
    <div id="backgroundimage">
    <?php include_once "header.php" ?>
    <div class="container text-light">
    <h1 class="text-center my-5 fw-bold">CV Form</h1>
    <div class="form-container">
        <form action="cv2.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="token" value="HGsZOXpfNC"  >

            <div class="border border-dark p-3 mb-3">    
                <h2>Skills (Max:5)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Skillset Name</label>
                    <input type="text" class="form-control" name="skill1" required maxlength = "25"  minlength="4">
                    <select class="form-select mt-2" name="skill_level1" required>
                        <option value="">Select option based upon your skill level</option>
                        <option value="1">1 - Novice</option>
                        <option value="2">2 - Advanced Beginner</option>
                        <option value="3">3 - Competent</option>
                        <option value="4">4 - Proficient</option>
                        <option value="5">5 - Expert</option>
                    </select>
                </div>
                <div id="addSkill"></div>
                <div class="mb-3">
                    <button type="button" id="skill_hide" class="btn btn-primary form-control" onclick="addSkill()">+</button>
                </div>
            </div>
            
            <div class="border border-dark p-3 mb-3">    
                <h2>About Me</h2>
                <div class="form-floating">
                    <textarea class="form-control" name="about_me" style="height: 100px" rows = "5" cols = "40" maxlength = "200" required></textarea>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Education (Max:3)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">School/College/University</label>
                    <input type="text" name="institute1" class="form-control"  maxlength = "50"  minlength="4" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Degree Name</label>
                    <input type="text" name="degree1" class="form-control"  maxlength = "50"  minlength="4" required>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <label for="exampleInputEmail1" class="form-label">From</label>
                        <input type="date" name="from1" class="form-control" required>
                    </div>
                    <div>
                        <label for="exampleInputEmail1" class="form-label">To</label>
                        <input type="date" name="to1" class="form-control"  required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Grade/Score/CGPA</label>
                    <input type="text" name="grade1" class="form-control"  maxlength = "20"  minlength="1" required>
                </div>
                <div id="addEducation"></div>
                <div class="mb-3">
                    <button type="button" id="education_hide" class="btn btn-primary form-control" onclick="addEducation()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Experience (Max:3)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title1" class="form-control"  maxlength = "50"  minlength="4" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" name="description1" class="form-control"  maxlength = "50"  minlength="4" required>
                </div>
                <div id="addExperience"></div>
                <div class="mb-3">
                    <button type="button" id="experience_hide" class="btn btn-primary form-control" onclick="addExperience()">+</button>
                </div>
            </div>
            <input type="submit" class="btn btn-primary form-control">
        </form>
    </div>
    </div>
    <script src="app.js"></script>
    <?php include_once "footer.php" ?>
</div>
</body>
</html>

<style>
*{
    margin: 0;
    padding: 0;
    color: #00007C;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}
#backgroundimage {
background-image: url("imgs/bg1.png");
background-color: #F7F7F7;
width: 100vw;
height: 100vh; 
background-size: 100% 100%;
background-repeat: repeat;
position: relative;
}
form .button input:hover{
	background-color:grey;
	
}
form .btn-primary {
    color: #fff;
    background-color: #00007C;
    border: none;
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
  width: 210mm;
  height: 297mm;
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
  border-radius: 50%;
  /* background-image: url("https://image.freepik.com/free-photo/waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer_273609-16320.jpg"); */
  background-position: center top;
  background-size: 200%;
  border: 4px solid #2c2b29;
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
  color: #00007C;
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
  background-color: #00007C;
  border-radius: 50%;
  margin-right: 10px;
}
.grid-container .zone-1 .personal-box .progress .fa-star.active {
  color: #00007C;
  margin-right: 5px;
}
.grid-container .zone-1 .hobbies-box {
  margin-top: 35px;
}
.grid-container .zone-1 .hobbies-box .logo {
  margin: 10px 0px;
  display: grid;
  grid-template: 1fr 1fr/1fr 1fr;
  font-size: 2.8em;
  grid-row-gap: 15px;
}
.grid-container .zone-2 {
  background: #999;
  padding: 40px 20px;
  padding-right: 75px;
  color: #b5b5b4;
}
.grid-container .zone-2 .headTitle {
  font-size: 2.1em;
  color: #00007C;
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
  background: #00007C;
  color: #2c2b29;
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
  background: #00007C;
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
  border-left: 2px solid #00007C;
}
.grid-container .zone-2 .group-2 .desc ul:last-of-type li:before {
  content: none;
}
.grid-container .zone-2 .group-2 .desc ul li div:last-of-type {
  color: #00007C;
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
  background: #00007C;
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
  border-left: 2px solid #00007C;
}
.grid-container .zone-2 .group-3 .desc ul:last-of-type li:before {
  content: none;
}
.grid-container .zone-2 .group-3 .desc ul li div:nth-child(2) {
  color: #00007C;
  font-weight: bold;
}
</style>
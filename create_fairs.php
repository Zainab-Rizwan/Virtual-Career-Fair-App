<?php
session_start();
require_once('db_connection.php');
if (isset($_POST['create']))
{   
    echo "".$_SESSION['admin_id'];
    $ad_id = $_SESSION['admin_id'];
    $title=$_POST['title'];
    $des=$_POST['des'];
    $date=$_POST['date'];
    $start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];

    $sql="INSERT INTO fairs (admin_id,title,description,date,start_time,end_time) value ('$ad_id','$title', '$des',  
          '$date','$start_time','$end_time')";
           $res = $conn->query($sql);

	if($res){
		header("location:admin_portal.php");
	} 
    else{
        echo "<center><h3><script>alert('Server error !!');</script></h3></center>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Fair</title>
    <?php require "header.php";?>
</head>
<body>
    
<h2 class = CF >Create Fair</h2>
    <!-- Step 1:Adding HTM -->
    <form action="create_fairs.php" method = "post" style=" position: relative;
    left: 220px;'" >
        <div class="container"> 
            <label><b>Title</b></label><br>
            <input type="text" placeholder="Enter Title" name="title" required><br>
            <label><b>Description</b></label><br>
            <textarea type="text"  rows="4" cols="50" name="des" required> </textarea><br>
            <label><b>Date</b></label><br>
            <input type="date"  name="date" required><br>
            <label><b>Start Time</b></label><br>
            <input type="time"  name="start_time" required><br>
            <label><b>End Time</b></label><br>
            <input type="time"  name="end_time" required><br>
 
            <div class="clearfix">
                <button type="submit" class="createbtn" name = "create">Create</button>
                <!-- <button type="button" class="cancelbtn">Cancel</button> -->
            </div>
        </div>
    </form>
</body>
</html>

<style>
    /*add full-width input fields*/
     
    input[type=text],
    textarea[type=text],
    input[type=text],
    input[type=time],
    input[type=date]  {
        width: 60%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
    }
    
    .CF{
        text-align: center;
        font-weight: bold;
    }
    /* set a style for all buttons*/
    button {
        background-color: Green;
        color: white;
        padding: 15px 20px;
        margin: 8px 0;
        cursor: pointer;
        
    }
    /*set styles for the cancel button*/
     
    .cancelbtn {
        padding: 15px 20px;
        background-color: #003366;
    }
    /*float cancel and signup buttons and add an equal width*/
     
    .cancelbtn,
    .createbtn {
        float: left;
        width: 60%;
    }
    /*add padding to container elements*/
     
    .container {
        padding: 16px;
    }
    /*clear floats*/
     
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    /*styles for cancel button and signup button
      on extra small screens*/
     
    @media screen and (max-width: 300px) {
        .cancelbtn,
        .createbtn {
            width: 100%;
        }
    }
</style> 

<?php
require "footer.php";
?>

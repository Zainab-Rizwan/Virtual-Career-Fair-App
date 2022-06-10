<?php
session_start();
require_once('db_connection.php');
 $id = $_GET['fair_id'];
 $sql1 = "SELECT * from fairs where ID='$id'";
 $result = mysqli_query($conn, $sql1);
 $row = mysqli_fetch_array($result);
 $title = $row['title'];
 $des = $row['description'];
 $date = $row['date'];
 $s_time = date("g:i a", strtotime($row['start_time']));
 $start_time = date("H:i:s", strtotime($s_time));
 $e_time = date("g:i a", strtotime($row['end_time']));
 $end_time = date("H:i:s", strtotime($e_time));

if (isset($_POST['update']))
{   
    // $id = $_GET['fair_id'];
    $ad_id = $_SESSION['admin_id'];
    $title=$_POST['title'];
    $des=$_POST['des'];
    $date=$_POST['date'];
    $start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];

    $sql= "UPDATE fairs SET admin_id= '$ad_id', title='$title' , description='$des' , date='$date', start_time='$start_time', end_time='$end_time' where ID='$id'";
        // $res = $conn->query($sql);

    if( mysqli_query($conn, $sql) ){
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
    
<h2 class = CF>Update Fair</h2>
    <!-- Step 1:Adding HTM -->
    <form action="edit_fair.php?fair_id=<?php echo $_GET['fair_id']; ?>" method = "post" style="border:1px solid #ccc">
        <div class="container">
            <label><b>Title</b></label>
            <input type="text" placeholder="Enter Title" name="title" value="<?php echo $title; ?>" required>
            <label><b>Description</b></label>
            <textarea type="text"  rows="4" cols="50" name="des" required><?php echo $des; ?></textarea>
            <label><b>Date</b></label>
            <input type="date"  name="date" value="<?php echo $date; ?>" required>
            <label><b>Start Time</b></label>
            <input type="time"  name="start_time" value="<?php echo $start_time; ?>" required>
            <label><b>End Time</b></label>
            <input type="time"  name="end_time" value="<?php echo $end_time; ?>"required>
 
            <div class="clearfix">
                <button type="submit" class="createbtn" name = "update">Update</button>
                <button type="button" class="cancelbtn">Cancel</button>
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
        width: 100%;
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
        width: 100%;
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
        width: 50%;
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

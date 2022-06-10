<?php
session_start();
require_once('db_connection.php');

$rec_id = $_GET['rid'];
$fair_id = $_GET['fid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Fair</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php require "header.php";?>
</head>

<style>
    /*add full-width input fields*/
   

    input[type=text],
    textarea[type=text],
    input[type=checkbox],
    input[type=time]

     {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
    }

    .int_time{
        width: 50%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
    }
    .category{
        width: 100%;
        padding: 5px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
    }
    #standard-select{
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


.select2-container--default .select2-selection--multiple {
    width: 100%;
    padding: 10px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #ccc;
    box-sizing: border-box
}
/* .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    background-color: transparent;
    border: none;
    /* border-right: 1px solid #aaa; */
    /* border-top-left-radius: 4px; */
    /* border-bottom-left-radius: 4px;
    color: #999;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
    padding: 0 1px;
    position: absolute;
    left: -80px;
    top: -6px;
} */
     
    @media screen and (max-width: 300px) {
        .cancelbtn,
        .createbtn {
            width: 100%;
        }
    }

</style> 


<body>
    
<h2 class = CF>Add Job</h2>
    <!-- Step 1:Adding HTM -->
    <form action="job-backend.php?rid=<?php echo $rec_id?>&fid=<?php echo $fair_id ?>" method = "post" name = "job_form" style="border:1px solid #ccc" >
    <div class="container">
            <label for="fname">Job Title :</label><br>
            <input type="text" id="fname" name="jobtitle" placeholder="jobtitle.." required><br>                    
            <label for="jdesc">Job Description</label><br>  
            <textarea  type = "text" id="jdesc" name="jobdescription" rows="4" cols="50" placeholder="includes the kind of job you are offering..."  required></textarea><br>
            
            <label for="salary package">Salary Package and Allowances</label><br>  
            <textarea  type = "text" id="salary package" name="salarypackage" rows="3" cols="50" placeholder="salary package and monthly allowances you are offering for this job..."  required></textarea><br>
             
            <label for="standard-select">Emloyment Type</label><br>  
            <div class="select">
            <select id="standard-select" name="employment_type" required>
                <option value=""disabled selected > Select Employment Type</option>
                <option value="Full-time" name="employment_type">Full-time</option>
                <option value="Part-time"name="employment_type">Part-time</option>
                <option value="Seasonal"name="employment_type">Seasonal</option>
            </select><br>
            </div> 
            <label for="standard-select">Job Type</label>
            <div class="select">
            <select id="standard-select" name="job_type" required >
                <option value=""disabled selected > Select Job Type</option>
                <option value="Cooperative Education" name="job_type">Cooperative Education</option>
                <option value="Experential learning" name="job_type">Experential learning</option>
                <option value="Fellowship" name="job_type">Fellowship</option>
                <option value="Graduate school" name="job_type">Graduate school</option>
                <option value="Internship" name="job_type">Internship</option>
                <option value="Job" name="job_type">Job</option>
                <option value="Volenteer" name="job_type">Volenteer</option>    
            </select><br>
            </div>
            <label for="standard-select">Select Category</label>
             <div class="select" >
             <select  id = 'standard-select' name="category[]"  class= 'select-cat' required multiple >
             <!-- <option value="" disabled selected >select category</option> -->
                <?php
                $sql = "SELECT * from  Engineerings";
                $result_categories = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result_categories)) {
                  $id = $row['ID'];
                  $name = $row['name']; ?>
                  <option value="<?php echo $name ?>"><?php echo $row['name'] ?> </option>
           <?php } ?>
                
             </select>
            </div>  
            <label for="fname">Interviews Starting time:</label><br>
            <input type="time" id="fname" name="stime"  required><br>  
            <label for="fname">Interviews ending time:</label><br>
            <input type="time" id="fname" name="etime"  required><br> 
            <label for="fname">Time for each interview:</label><br>
            <input type="number" class="int_time" name="each"  required style="width: 10%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 2px solid #ccc;box-sizing: border-box;">
            <label for="fname">Minutes</label><br>
            <div class="clearfix">
                <button type="submit" class="createbtn" name = "request">Post</button>
                <button type="button" class="cancelbtn" onclick ="window.location.href='Fair details.php?fair_id=<?php echo $_GET['fid']; ?>'">Cancel</button>
            </div>
    </div>
    </form>   
</body>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script> 
$(document).ready(function() {
    $('.select-cat').select2();
});
</script>
</html>



<?php
require "footer.php";
?>

<?php  
session_start();
$delete = false;
$delete1=false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "career_fair_app";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `recruiter_signup2` WHERE `ID` = $id";
    $result = mysqli_query($conn, $sql);
}else if(isset($_GET['delete1'])){
    $s_id = $_GET['delete1'];
    $delete1 = true;
    $sql = "DELETE FROM `student_signup` WHERE `ID` = $s_id";
    $result = mysqli_query($conn, $sql);
}
  ?>

<?php
if($delete){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='text-align:right'>
<strong>Success!</strong> Your entry has been deleted successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>×</span>
</button>
</div>";
}
if($delete1){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='text-align:right'>
    <strong>Success!</strong> Your entry has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>×</span>
    </button>
    </div>";
    }
//if($delete1){
   // echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='text-align:right'>
   // <strong>Success!</strong> Your note has been deleted successfully
    //<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //<span aria-hidden='true'>×</span>
    //</button>
    //</div>";
   // }
?>
   
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">


<head>

<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <title>Recruiters|Students </title>
     
     
    <style>
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

        .table-title h2 {
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
   
</head>


      <body>
      <?php include 'header.php'; ?>      
      
      <div class="container-xl">
        <div class="table-responsive" style="margin-left:100px;margin-right:100px;" >
            <div class="table-wrapper" style="color:white;width:1190px;">
                <div class="table-title " >
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage Recruiter</h2>
                        </div>
                       
                    </div>
                </div>
                    <div class="container my-4" 
                        style="background-color:#F0F8FF;text-align:center;">
                        <table class="table table-bordered" id="myTable"
                            style="background-color:rgba(0, 0, 250, 0.1)">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">ID</th>
                                    <th scope="col">Recruiter name</th>
                                    <th scope="col">company</th>
                                    <th scope="col">job title</th>
                                    <th scope="col">city</th>
                                    <th  scope="col">address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                                                                        
                                    $sql = "SELECT * FROM `recruiter_signup2`";
                                
                                    $result = mysqli_query($conn, $sql);
                                    $ID = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['ID'];
                                        $ID = $ID + 1;
                                        echo "<tr>
                                        <th scope='row'>". $ID . "</th>
                                        <td>". $row['rec_name'] . "</td>
                                        <td>". $row['com_name'] . "</td>
                                        <td>". $row['job_title'] . "</td>
                                        <td>". $row['com_city'] . "</td>
                                        <td>". $row['com_address'] . "</td>
                                        <td > 
                                        <a href='adminViewRecPro.php?r_id=$id' class='btn btn-primary' role='button' style='color:#003366;'><span style='color:white;'>view profile</span></a>
                                            <a href='#' class='delete' data-toggle='modal' ><i class='material-icons' data-toggle='tooltip' title='Delete' id =d".$row['ID'].">&#xE872;</i></a>
                                            
                                        </td>
                                    </tr>";
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
            $('#myTable').DataTable();

        });
    </script>
                              
    


<!-----next table --->


 
     
    <!---- next table--->
<div class="container-xl" >
        <div class="table-responsive" style="margin-left:100px;margin-right:100px;">
            <div class="table-wrapper" style="color:white;width:1190px;">
                <div class="table-title ">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage students</h2>
                        </div>
                       
                    </div>
                </div>
                    <div class="container my-4" 
                        style="background-color:#F0F8FF;text-align:center;">
                        <table class="table table-bordered" id="Table"
                            style="background-color:rgba(0, 0, 250, 0.1)">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">ID</th>
                                    <th scope="col">name</th>
                                    <th scope="col">contactnumber</th>
                                    <th scope="col">city</th>
                                    <th scope="col">country</th>
                                    <th scope="col">education</th>
                                    <th scope="col">Major</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                                                                        
                                    $sql = "SELECT * FROM `student_signup`";
                                
                                    $result = mysqli_query($conn, $sql);
                                    $s_ID = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['ID'];
                                        $s_ID = $s_ID + 1;
                                        echo "<tr>
                                        <th scope='row'>". $s_ID . "</th>
                                        <td>". $row['name'] . "</td>
                                        <td>". $row['phone_no'] . "</td>
                                        <td>". $row['std_city'] . "</td>
                                        <td>". $row['std_country'] . "</td>
                                        <td>". $row['degree_title'] . "</td>
                                        <td>". $row['major'] . "</td>
                                        <td > 
                                        <a href='adminViewStdPro.php?s_id=$id'class='btn btn-primary' role='button'>view profile</a>
                                        <a href='#' class='delete1' data-toggle='modal' ><i class='material-icons' data-toggle='tooltip' title='Delete1' id =d".$row['ID'].">&#xE872;</i></a>
                                        </td>
                                    </tr>";
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
            $('#Table').DataTable();

        });
    </script>
    <script>
        
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        id = e.target.id.substr(1,);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location=`/week7/showr_rec_stud.php?delete=${id}`;
      
        }
        else {
          console.log("no");
        }
      })
    })
    </script>
  
    <script>
        
        deleted = document.getElementsByClassName('delete1');
        Array.from(deleted).forEach((element) => {
          element.addEventListener("click", (e) => {
            console.log("edit",);
            s_id = e.target.id.substr(1,);
    
            if (confirm("Are you sure you want to delete this note!")) {
              console.log("yes");
              window.location=`/week7/showr_rec_stud.php?delete1=${s_id}`;
          
            }
            else {
              console.log("no");
            }
          })
        })
    </script>
    */
    <?php include 'footer.php';?>
                          
    </body>    
</html>                                    
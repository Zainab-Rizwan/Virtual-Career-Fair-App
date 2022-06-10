<?php  
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "se_school";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
    $p_ID = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `parent` WHERE `p_ID` = $p_ID";
    $result = mysqli_query($conn, $sql);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['p_IDEdit'])){
      // Update the record
      $p_ID =  $_POST["p_IDEdit"];
      $p_name =  $_POST["p_nameEdit"];
      $email = $_POST["emailEdit"];
    
    
 
    // Sql query to be executed
    $sql = "UPDATE `parent` SET  `p_name` = '$p_name' ,`email` = '$email' WHERE `parent`.`p_ID` = $p_ID ";

    $result = mysqli_query($conn, $sql);
    if($result){
      $update = true;
  }
  else{
      echo "We could not update the record successfully ---> " . mysqli_error($conn);
  }
  }
else{
        $p_name = $_POST["p_name"];
        $email = $_POST["email"];
            
          // Sql query to be executed
            $sql = "INSERT INTO `parent` ( `p_name`,`email`) VALUES ( '$p_name','$email')";
          $result = mysqli_query($conn, $sql);
            
          if($result){ 
              $insert = true;
         }
          else{
              echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
              }
    
    }
}
?>
 <?php
if($insert){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='text-align:right'>
<strong>Success!</strong> Your note has been inserted successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>×</span>
</button>
</div>";
}
?>
<?php
if($delete){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='text-align:right'>
<strong>Success!</strong> Your note has been deleted successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>×</span>
</button>
</div>";
}
?>
<?php
if($update){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='text-align:right'>
<strong>Success!</strong> Your note has been updated successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>×</span>
</button>
</div>";
}
?>

<!--php ends-->


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="dashboard.css">
    <script src="dashboard.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="download.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
   
    <style>
        body {
            color: black;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 14px;

        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: darkgray;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: darkgray;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
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
            background-color: darkgray;
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
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
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
            color: #999;
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

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>

</head>

<body onload='document.form1.email.focus()'>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">THE EDUCATORS</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="img/user.jpg" style="width:60px;height: 60px;"
                            alt="User picture">
                    </div>
                    <div class="user-info">
                    <a href="admin_profile.php" style="color:#e2e0ff;"><strong></strong></a>
            <?php    
                  $sql = "SELECT username FROM adminn ";                      
                  $result = mysqli_query($conn, $sql);
                  
                  while($row = mysqli_fetch_assoc($result)){
                      echo "<tr>
                      <td>". $row['username'] . "</td>
                      </tr>";
                      
                  }

                  ?>
                        <span class="user-role">Admin</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->


                <div class="sidebar-menu">
                    <ul>
                        <!--DASHBOARD-->
                        <li>
                            <a href="admin_dashboard.php">
                                <i class="fa fa-folder"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!--TEACHERS-->
                        <li>
                            <a href="admin_teacher.php">
                                <i class="fa fa-book"></i>
                                <span>Teachers</span>
                            </a>
                        </li>
                        <!--STUDENTS-->
                        <li>
                            <a href="admin_student.php">
                                <i class="fa fa-calendar"></i>
                                <span>Students</span>
                            </a>
                        </li>
                        <!--PARENTS-->
                        <li>
                            <a href="admin_parent.php">
                                <i class="fa fa-folder"></i>
                                <span>Parents</span>
                            </a>
                        </li>
                        <!--TRANSPORT-->
                        <li>
                            <a href="admin_transport.php">
                                <i class="fa fa-folder"></i>
                                <span>transport</span>
                            </a>
                        </li>

                        <!--CLASSES-->
                        <li>
                            <a href="admin_classes.php">
                                <i class="fa fa-folder"></i>
                                <span>Classes</span>
                            </a>
                        </li>
                        <!--ATTENDENCE-->
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Attendence</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="admin_student_att.php">Student's Attendence</a>
                                    </li>
                                    <li>
                                        <a href="admin_teacher_att.php">Teacher's Attendence</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">

                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="login_signin.html">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>

        <!--------main-->
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="breadcrumbs-area">
                    <h3>Parent</h3>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-12">
                       
                        <div class="container-xl">
                            <div class="table-responsive">
                                <div class="table-wrapper" style="color:white;">
                                    <div class="table-title ">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Manage parent</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#addEmployeeModal" class="btn btn-success"
                                                    data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add
                                                        New Parent</span></a>
                                                        <button class="btn btn-primary" id="download">download pdf</a></button>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Breadcubs Area Start Here -->
                                    <div class="container my-4" <table
                                        style="background-color:darkgray;text-align:center;">
                                        <table class="table table-bordered" id="myTable"
                                            style="background-color:rgba(10, 10, 10, 0.589)">
                                            <thead>
                                                <tr>
                                                   
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Parent Name</th>
                                                    <th scope="col">Child Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                                                                      
                                                   $sql = "SELECT p.* , s.* FROM `parent` p, `student` s WHERE p.p_name = s.p_name";
                                               
                                                    $result = mysqli_query($conn, $sql);
                                                    $p_ID = 0;
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        $p_ID = $p_ID + 1;
                                                        echo "<tr>
                                                        <th scope='row'>". $p_ID . "</th>
                                                        <td>". $row['p_name'] . "</td>
                                                        <td>". $row['s_name'] . "</td>
                                                        <td>". $row['phone'] . "</td>
                                                        <td>". $row['email'] . "</td>
                                                        <td>". $row['address'] . "</td>
                                                        <td > 
                                                            <a href='#edit' class='edit' data-toggle='modal' ><i class='material-icons' data-toggle='tooltip' title='Edit' id =".$row['p_ID']." >&#xE254;</i></a>
                                                            <a href='#delete' class='delete' data-toggle='modal' ><i class='material-icons' data-toggle='tooltip' title='Delete' id =".$row['p_ID'].">&#xE872;</i></a>
                                                        </td>
                                                    </tr>";
                                                    } 
                                                    ?>
                                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- Breadcubs Area End Here -->

                                </div>
                            </div>
                           

                            <!-- Add Modal HTML -->
                            <div id="addEmployeeModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" action="admin_parent.php">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Parent</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                           
                                                <div class="form-group">
                                                    <label>Parent</label>
                                                    <input type="text" name = "p_name" id = "p_name"  class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name = "email" id = "email" class="form-control" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal"
                                                    value="Cancel">
                                                <input type="submit" class="btn btn-success" value="Add">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal HTML -->
                            <div id="edit" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit parent</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">x</button>
                                            </div>
                                            <form action="admin_parent.php" method="POST">
                                            <div class="modal-body"> 
                                            <input type="hidden" name="p_IDEdit" id="p_IDEdit">                                              
                                            <div class="form-group">
                                                    <label>Parent Name</label>
                                                    <input type="text" name = "p_nameEdit" id = "p_nameEdit" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name = "emailEdit" id = "emailEdit" class="form-control" required>
                                                </div>
                                        
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal"
                                                    value="Cancel">
                                                <input type="submit" class="btn btn-info" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>

        </main>






        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

        });
    </script>
      <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ",e.target.parentNode.parentNode.parentNode);
        tr = e.target.parentNode.parentNode.parentNode;
        p_name= tr.getElementsByTagName("td")[0].innerText;
        email = tr.getElementsByTagName("td")[3].innerText;      
       
        console.log(p_name,email);
        p_nameEdit.value = p_name;
        emailEdit.value = email;
        p_IDEdit.value = e.target.id;
        console.log(e.target.id)
        $('#edit').modal('toggle');
      })
    })
   

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete ");
        p_ID = e.target.id;

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
      
        }
        else {
          console.log("no");
        }
      })
    })
    </script>
      <script>
        function ValidateEmail(inputText)
        {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailformat))
        {
        alert("Valid email address!");
        document.form1.email.focus();
        return true;
        }
        else
        {
        alert("You have entered an invalid email address!");
        document.form1.email.focus();
        return false;
        }
        }
        </script>
  

</body>

</html>
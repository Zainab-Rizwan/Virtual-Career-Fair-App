<?php
session_start();
require_once('db_connection.php');
$admin_id = $_SESSION['admin_id'];
$spassword = $_POST['pass'];
$scpassword = $_POST['cpass'];


$sql1="SELECT * from admin_signup where ID='$admin_id' and password = '$spassword'";
    $row = $conn->query($sql1);
        
if($row->num_rows > 0){
    $result = mysqli_fetch_assoc($row);
    $_SESSION['admin_loggedin'] = "OK";
    $_SESSION['admin_id'] = $result['ID'];
    $_SESSION['admin_name'] = $result['name'];
    $_SESSION['admin_pass'] = $result['password'];
    $admin_pass=$_SESSION['admin_pass'];
    if($spassword  == $admin_pass){
            if($spassword  == $scpassword)
            {
               $sql = "DELETE from admin_signup where ID='$admin_id'";
                mysqli_query($conn , $sql);
                header("location:acc_deleted.php?");
            }
            else
            {
              echo "<script> window.alert('Incorrect Password!'); </script>";
            }
          }
    else
    {
      echo "<script> window.alert('Password does not match !'); </script>";
    }
    
}

else{
    echo "<center><h3><script>alert('Error. Account can't be deleted.);</script></h3></center>";
}

?>


<?php
session_start();
require_once('db_connection.php');
$std_id=$_SESSION['std_id'];

$spassword = $_POST['pass'];
$scpassword = $_POST['cpass'];



$sql2="SELECT * from student_signup where ID='$std_id' and password = '$spassword'";
    $row1 = $conn->query($sql2);

if($row1->num_rows > 0){
    $result = mysqli_fetch_assoc($row1);
    $_SESSION['std_loggedin'] = "OK";
    $_SESSION['std_id'] = $result['ID'];
    $_SESSION['std_name'] = $result['name'];
    $_SESSION['std_pass'] = $result['password'];
    $std_pass=$_SESSION['std_pass'];
    if($spassword  == $std_pass){
            if($spassword  == $scpassword)
            {
               $sql = "DELETE from student_signup where ID='$std_id'";
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
    echo "<center><h3><script>alert('Error. Account can't be deleted.');</script></h3></center>";
}

?>

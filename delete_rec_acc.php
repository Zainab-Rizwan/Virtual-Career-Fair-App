<?php
session_start();
require_once('db_connection.php');
$rec_id=$_SESSION['rec_id'];
$spassword = $_POST['pass'];
$scpassword = $_POST['cpass'];



$sql3="SELECT * from recruiter_signup2 where ID='$rec_id' and password = '$spassword'";
    $row2 = $conn->query($sql3);
        
if ($row2->num_rows > 0){
    $result = mysqli_fetch_assoc($row2);
    $_SESSION['rec_loggedin'] = "OK";
    $_SESSION['rec_id'] = $result['ID'];
    $_SESSION['rec_name'] = $result['rec_name'];
    $_SESSION['rec_pass'] = $result['password'];
    $rec_pass=$_SESSION['rec_pass'];
    if($spassword  == $rec_pass){
            if($spassword  == $scpassword)
            {
               $sql = "DELETE from recruiter_signup2 where ID='$rec_id'";
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

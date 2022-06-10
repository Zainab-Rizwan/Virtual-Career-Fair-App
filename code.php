<?php
include("db_connection.php");
if(isset($_POST['rec_update_btn'])){
  $edit_id=$_POST['edit_id'];
  $rec_img =$_FILES['rec_img']['name'];
  $query="UPDATE `recruiter_signup2` SET `rec_img` = '$rec_img' WHERE `ID` = '$edit_id'";
  $data=mysqli_query($conn,$query);
  echo "Executing query $query \n";
  if($data){
      move_uploaded_file($_FILES['rec_img']['tmp_name'],"rec_profiles/".$_FILES['rec_img']['name']);
      echo "image updated";
      $_SESSION['success']="image updated";
      header('Location:view_rec_Pro.php');
    }
  else{
    echo "not updated";
    $_SESSION['status']="image not updated";
    header('Location:rec_img.php');
  }
}
?>

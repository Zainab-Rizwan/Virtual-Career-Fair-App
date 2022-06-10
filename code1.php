<?php
include("db_connection.php");
if(isset($_POST['com_update_btn'])){
  $edit_id=$_POST['edit_id'];
  $com_logo =$_FILES['com_logo']['name'];
  $query="UPDATE `recruiter_signup2` SET `com_logo` = '$com_logo' WHERE `ID` = '$edit_id'";
  $data=mysqli_query($conn,$query);
  echo "Executing query $query \n";
  if($data){
      move_uploaded_file($_FILES['com_logo']['tmp_name'],"company_logos/".$_FILES['com_logo']['name']);
      echo "image updated";
      $_SESSION['success']="image updated";
      header('Location:view_rec_Pro.php');
    }
  else{
    echo "not updated";
    $_SESSION['status']="image not updated";
    header('Location:com_img.php');
  }
}
?>

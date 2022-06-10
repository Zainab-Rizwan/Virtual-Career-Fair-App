<?php
include("db_connection.php");
if(isset($_POST['std_update_btn'])){
  $edit_id=$_POST['edit_id'];
  $images =$_FILES['images']['name'];
  $query="UPDATE `student_signup` SET `images` = '$images' WHERE `ID` = '$edit_id'";
  $data=mysqli_query($conn,$query);
  echo "Executing query $query \n";
  if($data){
      move_uploaded_file($_FILES['images']['tmp_name'],$_FILES['images']['name']);
      echo "image updated";
      $_SESSION['success']="image updated";
      header('Location:view_std_pro.php');
    }
  else{
    echo "not updated";
    $_SESSION['status']="image not updated";
    header('Location:std_img.php');
  }
}
?>



<?php
session_start();
  include("db_connection.php");
if(isset($_POST['edit_data_btn'])){

 $id=$_POST['edit_id'];
 $sql= "SELECT * FROM recruiter_signup2 WHERE ID ='$id'";
 $result = mysqli_query($conn, $sql);

?>
<?php include "header.php"; ?>
			<form method="POST" enctype = "multipart/form-data" action="code.php">
				<div class="header">
					<h3 class="title" style="color:#000080">Update picture</h3>
				</div>
				<div class="body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label style="color:#000080">Choose picture</label>
						  <input type="hidden" name="edit_id" value="<?php echo $_POST['edit_id'] ?>">
							<input type="file" name="rec_img" id="rec_img" value="" class="form-control" required="required"/>
						</div>

					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
        <button type="submit" name="rec_update_btn" class="btn btn-primary">update</button>

				</div>
				</div>
			</form>
		</div>
<?php

}
?>


<style>
input[type=submit]{

    height: 4.5em;
    width: 60rem;
    padding: 10px 0px 10px 0px;
    margin: 10px auto;
    cursor: pointer;
    font-size: 11px;
    text-align: center;
    transition:.25s;
    background-color: #003366;
    border: 4px solid #ffff;

    color: white !important;
    text-decoration: white !important;
  }
  .title{
    text-align: center;
    color:	#6082B6;
}
.form-group label{
    color:	#6082B6;
}
button{
    margin-right:220px;
   
}


}
</style>
<?php include "footer.php"; ?>
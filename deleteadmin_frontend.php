<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">

        form {
          margin: 3em;
          width: 500px;
          border: 2px solid #ccc;
          padding: 30px;
          display: inline-block;
          background: #fff;
          border-radius: 15px;
        }

        h2 {
          text-align: center;
          margin: 2em;
        }

        input {
          display: block;
          border: 2px solid #ccc;
          width: 95%;
          padding: 10px;
          margin: 10px auto;
          border-radius: 5px;
        }
        label {
          color: #888;
          font-size: 18px;
          padding: 10px;
        }

        .button {
            height: 4.5em;
            width: 15rem;
            padding: 10px 0px 10px 0px;
            margin: 10px auto;
            cursor: pointer;
            font-size: 13px;
            text-align: center; 
            transition:.25s;
            background-color: #003366;
            border: 4px solid #ffff;
            border-radius: 50px;
            color: white !important;
            text-decoration: white !important;
          }

</style>
<title>Delete Accont</title>
    <meta name="viewport" content="width-device-width , initial_scale=1">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body>

<?php include_once "header.php" ?> 
<div class="back">
   <div class="container">
      <div class="deletacc-container"> 
          <form action="delete_admin_acc.php" method="post">
          <h2>DELETE ACCOUNT</h2>
          <br>
              <div class="password">
                   <h5>Password</h5>
                   <input type="password" class="form-control" id="password" name="pass" placeholder="Password" required>
              </div>

              <div class="con-pass">
                   <h5>Confirm Password</h5>
                   <input type="password" class="form-control" id="cpassword" name="cpass" placeholder="Confirm Password" required> ​
              </div>
              
              <button class="button" name="delete" type="submit">Delete</button>
          </form> 

      </div>
    </div>
</div>
<?php include_once "footer.php" ?> 
        
</body>
</html>
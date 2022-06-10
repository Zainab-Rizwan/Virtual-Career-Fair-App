<?php
session_start();
unset($_SESSION['std_loggedin']);
unset($_SESSION['std_id']);
unset($_SESSION['std_name']);
header("location:index.php");
session_destroy();
?>
<?php
session_start();
unset($_SESSION['admin_loggedin']);
unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);
header("location:index.php");
session_destroy();
?>
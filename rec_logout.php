<?php
session_start();
unset($_SESSION['rec_loggedin']);
unset($_SESSION['rec_id']);
unset($_SESSION['rec_name']);
header("location:index.php");
session_destroy();
?>
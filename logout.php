<?php
session_start();

include '_include/connect.php';
$email = $_SESSION['email'];
date_default_timezone_set('Africa/Lagos');
$cdate = date('d M Y h:i:s a', time());
                               
$query = mysqli_query($con, "UPDATE users SET l_active = '$cdate' WHERE email = '$email'");

session_destroy();


echo "<script> alert('Logout Successful'); window.location='index.php'; </script>";


?>
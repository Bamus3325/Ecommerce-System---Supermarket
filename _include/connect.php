<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "crms";

$con = mysqli_connect($server, $user, $pass, $db);
if (!$con) {
    echo "Database Not Connected";
}



?>
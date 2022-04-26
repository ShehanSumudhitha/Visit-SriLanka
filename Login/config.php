<?php

$sever = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($sever, $username, $password, $database);

if(!$conn){
    echo "<script>alert('Connection Failed')</script>";
}

?>
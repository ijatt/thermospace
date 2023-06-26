<?php

$user = "root";
$pass = "";
$host = "localhost";

$db = "hotel";

$conn = mysqli_connect($host, $user, $pass, $db) or die("Connection failed: " . mysqli_connect_error());
?>
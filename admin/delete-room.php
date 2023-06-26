<?php
require 'connect.php';

$roomID = $_GET['roomID'];

$sql = "DELETE FROM rooms WHERE roomID = '$roomID'";
$result = mysqli_query($conn, $sql);
if($result){
    header('Location: all-rooms.php?success=1&roomID='.$roomID);
    exit;
}
else{
    echo "Error: " . mysqli_error($conn);
}
?>
<?php

require_once 'connect.php';

$reserveID = $_GET['reserveID'];

$sql = "DELETE FROM reservation WHERE reserveID = '$reserveID'";
$result = mysqli_query($conn, $sql);
if($result){
    header('Location: all-booking.php?success=1&reserveID='.$reserveID);
    exit;
}
else{
    echo "Error: " . mysqli_error($conn);
}
?>
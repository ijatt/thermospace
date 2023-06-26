<?php
echo "Reserve page accessed";
session_start();
require_once 'connect.php';

$countSql = "SELECT COUNT(*) FROM reservation";
$countResult = $conn->query($countSql);
$countRow = $countResult->fetch_row();
$reservationCount = $countRow[0];

$reservationID = $reservationCount + 1;

$insertSql = "INSERT INTO reservation (checkIn, checkOut, price, customerID, roomID) VALUES ('".$_SESSION['check-in']."', '".$_SESSION['check-out']." ', '".$_SESSION['book-price']."', '".$_SESSION['customerID']."', '".$_SESSION['roomID']."')";
if($conn->query($insertSql) === TRUE) {
    echo "New record created successfully";
    header("Location: profile.php");
} else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
}
?>
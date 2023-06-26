<?php
require_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $reservationID = $_POST['reservationID'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

    $sql = "SELECT rooms.roomPrice FROM reservation, rooms WHERE reservation.roomID = rooms.roomID AND reservation.reserveID = '$reservationID'";
    $result = mysqli_query($conn, $sql);
    $pricePerNight = mysqli_fetch_assoc($result)['roomPrice'];

    $date1 = new DateTime($checkIn);
    $date2 = new DateTime($checkOut);
    $interval = $date1->diff($date2);
    $night = $interval->days;
    $subtotal = $night * $pricePerNight;
    $tax = 0.06 * $subtotal;
    $total = $subtotal + $tax;

    $updateQuery = "UPDATE reservation SET checkIn = '$checkIn', checkOut = '$checkOut', price = '$total' WHERE reserveID = '$reservationID'";
    $updateResult = mysqli_query($conn, $updateQuery);
    if($updateResult){
        header('Location: all-booking.php');
        exit;
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}

?>
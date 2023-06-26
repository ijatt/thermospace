<?php
require 'connect.php';
$customerType = $_POST['customerType'];

function insert($customerID){
    require 'connect.php';
    $bookingID = $_POST['reserveID'];
    $roomID = $_POST['roomID'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

    $roomSql = "SELECT * FROM rooms WHERE roomID = '$roomID'";
    $roomResult = mysqli_query($conn, $roomSql);
    $pricePerNight = mysqli_fetch_assoc($roomResult)['roomPrice'];
    $date1 = new DateTime($checkIn);
    $date2 = new DateTime($checkOut);
    $interval = $date1->diff($date2);
    $night = $interval->days;
    $subtotal = $night * $pricePerNight;
    $tax = 0.06 * $subtotal;
    $total = $subtotal + $tax;
    $sql = "INSERT INTO reservation (checkIn, checkOut, price, customerID, roomID) VALUES ('$checkIn', '$checkOut', '$total', '$customerID', '$roomID')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: all-booking.php');
        exit;
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}

if($customerType == 2){
    $customerID = $_POST['customerID'];
    insert($customerID);
}
else{
    $customerID = "6";
    $guestSql = "UPDATE customers SET email = '$_POST[email]', phone = '$_POST[phone]' WHERE customerID = '$customerID'";
    $guestResult = mysqli_query($conn, $guestSql);
    insert($customerID);
}

?>
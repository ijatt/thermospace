<?php

require_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $roomID = $_POST['roomID'];
    $roomName = $_POST['roomName'];
    $roomDesc = $_POST['roomDesc'];
    $roomBed = $_POST['roomBed'];
    $roomBath = $_POST['roomBath'];
    $roomWifi = $_POST['roomWifi'];
    $roomTv = $_POST['roomTv'];
    $roomPrice = $_POST['roomPrice'];

    $sql = "UPDATE rooms SET roomName = '$roomName', roomBed = '$roomBed', roomBath = '$roomBath', roomWifi = '$roomWifi', roomTv = '$roomTv', roomPrice = '$roomPrice' WHERE roomID = '$roomID'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: all-rooms.php');
        exit;
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }

}

?>
<?php

require_once 'connect.php';

$staffID = $_GET['staffID'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $staffName = $_POST['staffName'];
    $staffDOB = $_POST['staffDOB'];
    $staffEmail = $_POST['staffEmail'];
    $staffPhone = $_POST['staffPhone'];
    $staffAbout = $_POST['staffAbout'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];

    $query = "UPDATE staff SET staffName = '$staffName', staffDOB = '$staffDOB', staffEmail = '$staffEmail', staffPhone = '$staffPhone', staffAbout = '$staffAbout', address = '$address', city = '$city', postcode = '$postcode', country = '$country' WHERE staffID = '$staffID'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_query($conn, $query)){
        header('Location: profile.php');
        exit;
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
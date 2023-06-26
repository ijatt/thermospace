<?php
require_once 'connect.php';

$id = $_GET['customerID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];

$sql = "UPDATE customers SET firstName = '$firstName', lastName = '$lastName', email = '$email', phone = '$phone', Address = '$address', City = '$city' WHERE customerID = '$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: profile.php?function=showAlert');
}
else{
    echo "Error: " . $sql . "<br>" . $conn->$error;
}
?>
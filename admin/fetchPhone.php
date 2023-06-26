<?php
require_once 'connect.php';

$customerID = $_POST['customerID'];

$phoneQuery = "SELECT phone FROM customers WHERE customerID = '$customerID'";
$phoneResult = mysqli_query($conn, $phoneQuery);

if($phoneResult && mysqli_num_rows($phoneResult) === 1){
    $phoneData = mysqli_fetch_assoc($phoneResult);
    $phone = $phoneData['phone'];
    echo $phone;
}
else{
    echo "";
}
?>
<?php
require_once 'connect.php';
$customerID = $_POST['customerID'];

$emailQuery = "SELECT email FROM customers WHERE customerID = '$customerID'";
$emailResult = mysqli_query($conn, $emailQuery);

if($emailResult && mysqli_num_rows($emailResult) === 1){
    $emailData = mysqli_fetch_assoc($emailResult);
    $email = $emailData['email'];
    echo $email;
}
else{
    echo "";
}
?>

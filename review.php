<?php
require_once 'connect.php';
$rating = $_POST['rating'];
$comments = $_POST['review'];
$customerID = $_GET['customerID'];
$sql = "INSERT into reviews (ratings, comments, customerID) values ('$rating', '$comments', '$customerID')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: profile.php?function=showAlert&reviewSuccess=true');
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
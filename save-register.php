<?php
session_start();
require_once 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$city = $_POST['city'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$imageUrl = $_POST['imageUrl'];

$query = "SELECT COUNT(*) AS totalCustomers FROM customers";
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
  // Fetch the result row as an associative array
  $row = mysqli_fetch_assoc($result);

  // Step 2: Extract the total number of customers
  $totalCustomers = $row['totalCustomers'];

  // Step 3: Increment the total number of customers by 1 to get the next customer ID
  $nextCustomerID = $totalCustomers + 1;

    // Insert the form data into the database table 'customers'
    // Replace 'your_database_table' with the actual table name in your database
    // Adjust the column names according to your database table structure
    $sql = "INSERT INTO customers (firstName, lastName, email, phone, username, password, picURL, Address, City)
        VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$username', '$password', '$imageUrl', '$address', '$city')";
}
// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    // If the query execution is successful, you can send a success response back to the client
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['picURL'] = $imageUrl;
    $response = array('success' => true);
    echo json_encode($response);
} else {
    // If an error occurs during the query execution, you can send an error response back to the client
    echo "Error: " . $sql . "<br>" . $conn->$error;
}

// Close the database connection
$conn->close();

?>
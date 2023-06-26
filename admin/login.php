<?php

session_start();

require_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM staff WHERE staffEmail = '$email' AND pass = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: homepage.php');
        exit;
    }
    else{
        $error = 'Incorrect email or password!';
    }
}

?>
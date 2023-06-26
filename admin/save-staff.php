<?php

require_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_FILES['filename'])){
        $file = $_FILES['filename'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $destination = 'assets/img/profiles/' . $fileName;

        if(move_uploaded_file($fileTmpName, $destination)){
            echo 'File uploaded successfully';
        }
        else{
            echo 'Error uploading file';
        }
    }

    $staffName = $_POST['full-name'];
    $staffPosition = $_POST['role'];
    $staffDOB = $_POST['dob'];
    $staffEmail = $_POST['email'];
    $staffPhone = $_POST['phone'];
    $staffPassword = $_POST['password'];
    $imgURL = $destination;


    $sql = "INSERT INTO staff (staffName, staffPosition, staffDOB, staffEmail, staffPhone, pass, imgURL) VALUES('$staffName', '$staffPosition', '$staffDOB', '$staffEmail', '$staffPhone', '$staffPassword', '$imgURL')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: homepage.php');
        exit;
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}

?>
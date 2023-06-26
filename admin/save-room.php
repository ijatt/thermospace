<?php 
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $file = $_FILES['filename'];
    
    if($file['error'] === UPLOAD_ERR_OK){
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $tmpDestination = 'images/' . $fileName;
        $destination = '../' . $tmpDestination;

        if(move_uploaded_file($fileTmpName, $destination)){
            echo 'File uploaded successfully';
        }
        else{
            echo 'Error uploading file';
        }

    }

    $sql = "SELECT COUNT(*) from rooms";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = $row[0];
    $nextRoom = $count + 1;

    $roomName = $_POST['roomName'];
    $roomDesc = $_POST['roomDesc'];
    $roomBed = $_POST['roomBed'];
    $roomBath = $_POST['roomBath'];
    $roomWifi = $_POST['roomWifi'];
    $roomTv = $_POST['roomTv'];
    $roomPrice = $_POST['roomPrice'];

    $roomSql = "INSERT INTO rooms VALUES('$nextRoom', '$roomName', '$roomDesc', '$roomBed', '$roomBath', '$roomWifi', '$roomTv', '$roomPrice', '$tmpDestination')";
    $roomResult = mysqli_query($conn, $roomSql);
    if($roomResult){
        header('Location: all-rooms.php');
        exit;
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }

}
?>
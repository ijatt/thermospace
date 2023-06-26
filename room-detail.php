<?php

require_once 'connect.php';
include_once 'header.php'

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thermospace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/room-detail.css">
	<link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
</head>

<body>
    <!--create a section to display room detail and for making a reservation -->
    <main>
        <?php 

        if(isset($_GET['roomID'])) {
            $roomID = $_GET['roomID'];
            $sql = "SELECT * FROM rooms WHERE roomID = '$roomID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
        ?>
        <div class="body-container" id="body-container">
            <img src="<?php echo $row['roomImg'] ?>" alt="image">
            <div class="info">
                <p class="title"><?php echo $row['roomName'] ?></p>
                <p>RM <?php echo $row['roomPrice'] ?></p>
                <p><?php echo $row['roomDesc'] ?></p>
            </div>
            <div class="bed">
                <i class="fas fa-bed"></i>
                <p><?php echo $row['roomBed'] ?></p>
            </div>
            <div class="bath bed">
                <i class="fas fa-bath"></i>
                <p><?php echo $row['roomBath'] ?></p>
            </div>
            <div class="wifi bed">
                <i class="fas fa-wifi"></i>
                <p><?php echo $row['roomWifi'] ?></p>
            </div>
            <div class="tv bed">
                <i class="fas fa-tv"></i>
                <p><?php echo $row['roomTv'] ?></p>
            </div>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // User is logged in, show the reserve button
            ?>
                <button id="reserve" class="btn book-btn" type="submit">RESERVE</button>
            <?php
            } else {
                // User is not logged in, show a message or redirect to login page
                ?>
                <p id="login-prompt">Please <a href="#login-prompt" onclick="openLoginForm()">log in</a> to make a reservation.</p>
            <?php
            }
            ?>
        </div>
        <?php
        }
        else{
            echo '<pre';
            print_r($_GET);
            echo '</pre>';
        }
        ?>
    </main>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            var reserveBtn = document.getElementById('reserve');
            reserveBtn.addEventListener('click', function() {
                // Get the room ID
                var roomID = <?php echo $roomID;?>;
                var checkIn = '<?php echo $_GET['check-in'];?>';
                var checkOut = '<?php echo $_GET['check-out'];?>';
                // Redirect to reservation.php with the room ID as a query parameter
                window.location.href = 'reservation.php?roomID=' + roomID + '&check-in=' + checkIn + '&check-out=' + checkOut;
            });
        });
    </script>
</body>
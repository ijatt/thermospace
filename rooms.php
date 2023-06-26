<?php
    require_once 'connect.php';

    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms - Thermospace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/room.css">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
</head>

<body>
    <!-- ROOMS LIST -->
    <section id="rooms-list" class="rooms-list">
        <div class="container container-medium">
            <div class="row row-2">
                <h2>Rooms</h2>
                <form action="" method="get" id="search-form" class="search-form">
                    <div class="form-group">
                        <label for="check-in" id="check-in">Check In</label>
                        <input type="date" id="check-in" name="check-in" required
                            value="<?php echo isset($_GET['check-in']) ? $_GET['check-in'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="check-Out" id="check-out">Check out</label>
                        <input type="date" id="check-out" name="check-out" required
                            value="<?php echo isset($_GET['check-out']) ? $_GET['check-out'] : ''; ?>">
                    </div>
                    <button type="submit" value="Search" class="btn btn-white">SEARCH</button>
                </form>
            </div>
            <?php
                    if(isset($_GET['check-in']) && isset($_GET['check-out'])) {
                        $check_in = $_GET['check-in'];
                        $check_out = $_GET['check-out'];
                        $sql = "SELECT * FROM Rooms
                                WHERE roomID NOT IN (
                                    SELECT roomID FROM Reservation
                                    WHERE checkIn = '$check_in'
                                    AND checkOut = '$check_out'
                                )";
                        $result = mysqli_query($conn, $sql);
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($i % 2 == 0) {
                                echo '<div class="row">';
                            }
                ?>
            <div class="col-2">
                <div class="room-image">
                    <img src="<?php echo $row['roomImg'] ?>" alt="room">
                </div>
                <div class="room-info">
                    <div>
                        <h4><?php echo $row['roomName'] ?></h4>
                        <p><?php echo $row['roomDesc'] ?></p>
                        <p class="price"><span>RM<?php echo $row['roomPrice'] ?></span></span> / night</p>
                        <a
                            href="room-detail.php?roomID=<?php echo $row['roomID'] ?>&check-in=<?php echo $_GET['check-in']; ?>&check-out=<?php echo $_GET['check-out']; ?>">More
                            Details</a>
                    </div>
                </div>
            </div>
            <?php
                        if ($i % 2 != 0 || $i == mysqli_num_rows($result) - 1) {
                            echo '</div>'; // Close the row after every two rooms or at the end of the loop
                        }
                        $i++;
                    }
                }
                ?>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php include_once 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
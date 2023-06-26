<?php
    session_start();
    require_once 'connect.php';
    //include_once 'header.php';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_GET['roomID'])) {
        $roomID = $_GET['roomID'];
    
        // Fetch room details from the database
        $sql = "SELECT * FROM rooms WHERE roomID = '$roomID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    
        // Fetch cardholder name from the customers table using the logged-in user's ID
        $username = $_SESSION['username'];
        $customerSql = "SELECT * FROM customers WHERE username = '$username'";
        $customerResult = mysqli_query($conn, $customerSql);
        $customerRow = mysqli_fetch_assoc($customerResult);
        $cardholderName = $customerRow['firstName'] . " " . $customerRow['lastName'];
    
        // Calculate subtotal, tax, and total
        $pricePerNight = $row['roomPrice'];
        $checkOut = $_GET['check-out'];
        $checkIn = $_GET['check-in'];
        $date1 = new DateTime($checkIn);
        $date2 = new DateTime($checkOut);
        $interval = $date1->diff($date2);
        $night = $interval->days;
        $subtotal = $night * $pricePerNight;
        $tax = 0.06 * $subtotal;
        $total = $subtotal + $tax;

        //variable to store in the database
        $_SESSION['check-in'] = $_GET['check-in'];
        $_SESSION['check-out'] = $_GET['check-out'];
        $_SESSION['roomID'] = $roomID;
        $_SESSION['customerID'] = $customerRow['customerID'];
        $_SESSION['book-price'] = $total;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/reservation.css">
	<link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <style>
        .flex-row-lg {
            flex-direction: row;
        }
    </style>
</head>
<body class="body-container">
<div class="card-1">
        <div class="row  d-flex flex-lg-column">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                        <img src="<?php echo $row['roomImg'];?>"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="fw-bold"><?php echo $row['roomName']; ?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Price per night</p>
                            <p class="fs-14 fw-bold">RM <?php echo $pricePerNight; ?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Total Night</p>
                            <p class="fs-14 fw-bold"><span class="fas fa-dollar-sign pe-1"></span><?php echo $night;?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Subtotal</p>
                            <p class="fs-14 fw-bold">RM <?php echo $subtotal;?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Tax</p>
                            <p class="fs-14 fw-bold">RM <?php echo $tax?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                                <p class="fs-14 fw-bold">RM <?php echo $total;?></p>
                            </div>
                        </div>
                    </div>
                    <form action="reserve.php" method="post">
                        <div class="col-12 px-0">
                            <div class="row bg-light m-0">
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Payment detail</p>
                                </div>
                                <div class="col-12 px-4">
                                    <div class="d-flex  mb-4">
                                        <span class="">
                                            <p class="text-muted">Card number</p>
                                            <input class="form-control" type="text" required
                                                placeholder="XXXX XXXX XXXX XXXX" name="card-number" maxlength="19">
                                        </span>
                                        <div class=" w-100 d-flex flex-column align-items-end">
                                            <p class="text-muted">Expires</p>
                                            <input class="form-control2" type="text" required placeholder="MM/YY" name="expires" pattern="(0[1-9]|1[0-2])\/\d{2}" maxlength="5">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <span class="me-5">
                                            <p class="text-muted">Cardholder name</p>
                                            <input class="form-control" required type="text" name="cardholder-name" value="<?php echo $cardholderName; ?>"
                                                placeholder="Name">
                                        </span>
                                        <div class="w-100 d-flex flex-column align-items-end">
                                            <p class="text-muted">CVV</p>
                                            <input class="form-control3" type="text" required placeholder="XXX" name="cvv" pattern="([0-9]{3})" inputmode="numeric" maxlength="3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-12 p-0">
                                    <button type="submit" class="btn btn-primary">RESERVE<span class="fas fa-arrow-right ps-2"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const expiryInput = document.querySelector('input[name="expires"]');

        expiryInput.addEventListener('input', function (e) {
            const input = e.target;
            const trimmedValue = input.value.replace(/\s+/g, '');
            const formattedValue = trimmedValue.replace(/(\d{2})(\d{0,2})/, function (_, p1, p2) {
                return p2.length === 0 ? p1 : p1 + '/' + p2;
            });
        input.value = formattedValue;
        });

        const cardNumberInput = document.querySelector('input[name="card-number"]');

        cardNumberInput.addEventListener('input', function (e) {
            const input = e.target;
            const trimmedValue = input.value.replace(/\s+/g, '');
            const formattedValue = formatCardNumber(trimmedValue);
            input.value = formattedValue;
        });

        function formatCardNumber(value) {
            const cardNumberPattern = /(\d{1,4})/g;
            const groups = value.match(cardNumberPattern);

            if (groups) {
                return groups.join(' ');
            }

            return value;
        }
</script>
</body>
</html>
<?php
} else {
    // User is not logged in or roomID is not set, handle accordingly
    echo "Please log in to make a reservation.";
}
?>
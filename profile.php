<?php
session_start();

// Check if the user is logged i

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['picURL'])) {
  // User is logged in
  $username = $_SESSION['username'];

  require_once 'connect.php';

  $sql = "SELECT * FROM customers WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) === 1) {
    $userData = mysqli_fetch_assoc($result);
    $firstName = $userData['firstName'];
  } else {
    echo "User information not found.";
  }
} else {
  echo "User not logged in.";
}

if (isset($_POST['logout'])) {
  // Clear all session variables and destroy the session
  session_unset();
  session_destroy();

  // Redirect the user to index.php
  header("Location: index.php");
  exit;
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .rating-box .stars {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .stars i {
        color: #e6e6e6;
        font-size: 35px;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .stars i.active {
        color: #ff9c1a;
    }

    li a {
        text-decoration: none;
        color: black;
    }

    li a:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .alert {
        padding: 20px;
        background-color: #455d58;
        color: white;
        margin-bottom: 15px;
        display: none;
        position: fixed;
        top: 10px;
        z-index: 10;
        width: 100%;
        font-size: 16px;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }
    </style>
</head>

<body>
    <div class="alert" id="alert">
        <span id="alert-text">test</span>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times</span>
    </div>
    <div class="container" style="color: #455d58">
        <h3 style="color: #455d58">
            <?php echo $firstName ?>'s Profile
        </h3>
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $userData['picURL'] ?>" alt="Admin" class="rounded-circle"
                                    width="150" height="150" style="object-fit: cover">
                                <div class="mt-3">
                                    <h4>
                                        <?php echo $userData['username'] ?>
                                    </h4>
                                    <p class="text-muted font-size-sm">
                                        <?php echo $userData['City'] ?>
                                    </p>
                                    <form action="" method="POST">
                                        <a class="btn btn-primary" id="book" href="rooms.php">Book</a>
                                        <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $userData['firstName'] . " " . $userData['lastName'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $userData['email'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $userData['phone'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $userData['Address'] . ", " . $userData['City'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info edit-link" data-bs-toggle="modal"
                                        data-bs-target="#edit-detail">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0 flex-even"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                                </svg> Bookings</h6>
                            <h6 class="mb-0 flex-even"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg> Check-In Date</h6>
                            <h6 class="mb-0 flex-even"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg> Check-Out Date</h6>
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path
                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                </svg> Booking Status</h6>
                        </li>
                        <?php
          $username = $_SESSION['username'];
          $query = "SELECT * FROM rooms
                            INNER JOIN reservation ON reservation.roomID = rooms.roomID
                            INNER JOIN customers ON reservation.customerID = customers.customerID
                            WHERE customers.username = '$username' ORDER BY checkIn DESC";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $roomName = $row['roomName'];
              $checkInDate = $row['checkIn'];
              $checkOutDate = $row['checkOut'];
              $currentDate = date('Y-m-d');

              // Compare the current date with the check-in date
              if ($currentDate > $checkInDate) {
                $status = "Checked Out";
              } else {
                $status = "Room Booked";
              }
              ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <?php
                            if($status == 'Checked Out'){ ?>
                            <a class="mb-0 flex-even review-btn" data-bs-toggle="modal" data-bs-target="#rating-detail"
                                data-src=" <?php echo $row['roomImg']?>" data-name="<?php echo $roomName?>">
                                <?php echo $roomName; ?>
                            </a>
                            <?php } else { ?>
                            <h6 class=" mb-0 flex-even" href="<?php echo $href ?>">
                                <?php echo $roomName; ?>
                            </h6>
                            <?php } ?>
                            <span class="text-secondary flex-even">
                                <?php echo $checkInDate; ?>
                            </span>
                            <span class="text-secondary flex-even">
                                <?php echo $checkOutDate; ?>
                            </span>
                            <span class="text-secondary">
                                <?php echo $status; ?>
                            </span>
                        </li>
                        <?php
            }
          } else {
            // No bookings found
            echo '<li class="list-group-item">No bookings found.</li>';
          }
          ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-detail" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Details</h5>
                    <button type="button" class="btn btn-primary close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="update-profile.php?customerID=<?php echo $userData['customerID'] ?> " method="post">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?php echo $userData['firstName']?>"
                                    name="firstName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?php echo $userData['lastName']?>"
                                    name="lastName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?php echo $userData['email']?>"
                                    name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?php echo $userData['phone']?>"
                                    name="phone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?php echo $userData['Address']?>"
                                    name="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?php echo $userData['City']?>"
                                    name="city">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rating-detail" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Review</h5>
                    <button type="button" class="btn btn-primary close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="review.php?customerID=<?php echo $userData['customerID'] ?>" method="post">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <h5 class="room-name mb-3"></h5>
                            <img src="images/room-1.JPG" alt="image" class="rate-img img-thumbnail mx-auto"
                                style="width: 400px; height: 200px;">
                        </div>
                        <div class=" row mb-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="rating-box">
                                    <div class="stars">
                                        <label for="rating1">
                                            <input type="radio" id="rating1" name="rating" value="1"
                                                style="display: none;">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <label for="rating2">
                                            <input type="radio" id="rating2" name="rating" value="2"
                                                style="display: none;">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <label for="rating3">
                                            <input type="radio" id="rating3" name="rating" value="3"
                                                style="display: none;">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <label for="rating4">
                                            <input type="radio" id="rating4" name="rating" value="4"
                                                style="display: none;">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <label for="rating5">
                                            <input type="radio" id="rating5" name="rating" value="5"
                                                style="display: none;">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <h5 class=" mb-0">How was your stay?</h5>
                            </div>
                            <div class="col">
                                <textarea class="form-control" name="review" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {

        $('#rating-detail').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            console.log(button);
            console.log(button[0].outerHTML);
            var imgSRC = button.data('src');
            var headText = button.data('name');
            console.log(headText);
            $('.rate-img').attr('src', imgSRC);
            $('.room-name').text(headText);
        });
    });
    const stars = document.querySelectorAll(".stars i");
    // Loop through the "stars" NodeList
    stars.forEach((star, index1) => {
        // Add an event listener that runs a function when the "click" event is triggered
        star.addEventListener("click", () => {
            // Loop through the "stars" NodeList Again
            stars.forEach((star, index2) => {
                // Add the "active" class to the clicked star and any stars with a lower index
                // and remove the "active" class from any stars with a higher index
                index1 >= index2 ? star.classList.add("active") : star.classList
                    .remove(
                        "active");
            });
        });
    });
    const urlParams = new URLSearchParams(window.location.search);
    const functionName = urlParams.get('function');
    const reviewSuccess = urlParams.get('reviewSuccess');
    if (functionName === 'showAlert') {
        showAlert();
        if (reviewSuccess == 'true') {
            document.getElementById("alert-text").innerHTML = "Review Successfully Sent!";
        } else {
            document.getElementById("alert-text").innerHTML = "Update Success!";
        }

    }


    function showAlert() {
        var alert = document.getElementById("alert");
        alert.style.display = "block";
    }
    </script>
</body>
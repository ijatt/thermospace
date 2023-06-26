<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
	require_once 'connect.php';
	$email = $_SESSION['email'];

	$staffQuery = "SELECT * FROM staff WHERE staffEmail = '$email'";
	$staffResult = mysqli_query($conn, $staffQuery);

	if ($staffResult && mysqli_num_rows($staffResult) === 1) {
		$staffData = mysqli_fetch_assoc($staffResult);
	}
}

if(isset($_GET['reservationID']) ){
  $reservationID = $_GET['reservationID'];
}
else{
  $reservationID = '';
}

if(isset($_GET['checkIn'])){
  $checkIn = $_GET['checkIn'];
}
else{
  $checkIn = '';
}

if(isset($_GET['checkOut'])){
  $checkOut = $_GET['checkOut'];
}
else{
  $checkOut = '';
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <title>Thermospace</title>

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.png"
    />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />
    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />

    <link rel="stylesheet" href="assets/css/feathericon.min.css" />
    <link rel="stylesheet" href="assets/plugins/morris/morris.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap-datetimepicker.min.css"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="index.html" class="logo"> <img src="assets/img/hotel_logo.png" width="50" height="70" alt="logo"> <span class="logoclass">Thermospace</span> </a>
				<a href="index.html" class="logo logo-small"> <img src="assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="<?php echo $staffData['imgURL']; ?>" width="40" height="40" style="object-fit:cover;" alt="profile-pic"></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="<?php echo $staffData['imgURL']; ?>" alt="User Image" class="avatar-img rounded-circle" style="width: 38px !important; height: 38px !important; object-fit: cover;"> </div>
							<div class="user-text">
								<h6><?php echo $staffData['staffName']; ?></h6>
								<p class="text-muted mb-0"><?php echo $staffData['staffPosition']; ?></p>
							</div>
						</div> <a class="dropdown-item" href="profile.php">My Profile</a> <a class="dropdown-item" href="index.php">Logout</a> </div>
				</li>
			</ul>
		</div>
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li> <a href="homepage.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>
						<li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="all-booking.php"> All Booking </a></li>
								<li><a class="active" href="edit-booking.php"> Edit Booking </a></li>
								<li><a href="add-booking.php"> Add Booking </a></li>
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="all-customer.php"> All customers </a></li>
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Rooms </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="all-rooms.php">All Rooms </a></li>
								<li><a href="edit-room.php"> Edit Rooms </a></li>
								<li><a href="add-room.php"> Add Rooms </a></li>
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Staff </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="add-staff.php"> Add Staff </a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>

      <div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title mt-5">Edit Booking</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <form method="post" action="update-booking.php">
                <div class="row formtype">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Booking ID</label>
                      <input
                        class="form-control"
                        type="text"
                        value="<?php echo $reservationID?>"
                        name="reservationID"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Check In Date</label>
                      <div class="cal-icon">
                        <input
                          type="date"
                          class="form-control"
                          value="<?php echo $checkIn?>"
                          name="checkIn"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Check Out Date</label>
                      <div class="cal-icon">
                        <input
                          type="date"
                          class="form-control"
                          value="<?php echo $checkOut?>"
                          name="checkOut"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script>
      $(function () {
        $("#datetimepicker3").datetimepicker({
          format: "LT",
        });
      });
    </script>
  </body>
</html>

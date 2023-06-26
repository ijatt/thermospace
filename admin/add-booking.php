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

$sql = "SELECT COUNT(*) AS totalBook from reservation";
$bookResult = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($bookResult);
$totalBook = $row['totalBook'];
$nextBook = $totalBook + 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Thermospace</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>

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
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="<?php echo $staffData['imgURL']; ?>" width="40" height="40" alt="profile-pic" style="object-fit:cover;"></span> </a>
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
								<li><a href="edit-booking.php"> Edit Booking </a></li>
								<li><a class="active" href="add-booking.php"> Add Booking </a></li>
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
							<h3 class="page-title mt-5">Add Booking</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form action="save-booking.php" method="POST">
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Room Name</label>
										<select class="form-control" id="sel1" name="roomID">
											<option value="0">Select</option>
											<?php
											$roomQuery = "SELECT roomID, roomName FROM rooms";
											$roomResult = mysqli_query($conn, $roomQuery);

											while($roomRow = mysqli_fetch_assoc($roomResult)) {
												echo "<option value='" . $roomRow['roomID'] . "'>" . $roomRow['roomName'] . "</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Customer Type</label>
										<select class="form-control" id="sel2" name="customerType" onchange="updateOption()">
											<option>Select</option>
											<option value="1">Guest</option>
											<option value="2">Registered</option>
										</select>
									</div>
								</div>
								<div class="col-md-4 cust-name">
									<div class="form-group">
										<label>Customer Name</label>
										<select class="form-control" id="sel3" name="customerID" onchange="fetchEmail()">
											<option>Select</option>
											<?php
											$customerQuery = "SELECT * FROM customers";
											$customerResult = mysqli_query($conn, $customerQuery);

											while($customerRow = mysqli_fetch_assoc($customerResult)) {
												if($customerRow['firstName'] !== 'Guest') {
													echo "<option value='" . $customerRow['customerID'] . "'>" . $customerRow['firstName'] . " " . $customerRow['lastName'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Check In Date</label>
										<div class="cal-icon">
											<input type="date" class="form-control" name="checkIn"> </div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Check Out Date</label>
										<div class="cal-icon">
											<input type="date" class="form-control" name="checkOut"> </div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Email ID</label>
										<input type="text" class="form-control" id="usr" name="email"> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Phone Number</label>
										<input type="text" class="form-control" id="usr1" name="phone"> </div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary buttonedit1">Create Booking</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script>
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});

	function updateOption(){
		var custType = $("#sel2").val();
		var custName = $(".cust-name");

		if(custType == "1"){
			custName.hide();
		}
		else{
			custName.show();
		}
	}

	function fetchEmail(){
		var customerId = $("#sel3").val();
		var emailInput = $("#usr");
		var customerId = $("#sel3").val();
		var phoneInput = $("#usr1");

		$.ajax({
			url: "fetchEmail.php",
			type: "POST",
			data: { customerID: customerId },
			success: function(response){
				emailInput.val(response);
			}
		});

		$.ajax({
			url: "fetchPhone.php",
			type: "POST",
			data: { customerID: customerId },
			success: function(response){
				phoneInput.val(response);
			}
		});
	}


	</script>
</body>

</html>
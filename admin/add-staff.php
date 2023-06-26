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
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="<?php echo $staffData['imgURL']; ?>" width="40" height="40" alt="profile-pic" style="object-fit: cover;"></span> </a>
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
								<li><a class="active"href="add-staff.php"> Add Staff </a></li>
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
							<h3 class="page-title mt-5">Add Staff</h3> </div>
					</div>
				</div>
				<div class="row">
				<?php 
					if ($staffData['staffPosition'] === 'Admin' || $staffData['staffPosition'] === 'Manager') { ?>
					<div class="col-lg-12">
						<form action="save-staff.php" method="POST" enctype="multipart/form-data">
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Full Name</label>
										<input class="form-control" type="text" name="full-name"> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Date of Birth</label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" name="dob"> </div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Email ID</label>
										<input class="form-control" type="text" name="email"> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Phone Number</label>
										<input class="form-control" type="text" name="phone"> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Password</label>
										<input class="form-control" type="text" name="password"> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Confirm Password</label>
										<input class="form-control" type="text" name="confirm-password"> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Role</label>
										<select class="form-control" id="sel1" name="role">
											<option value="">Select</option>
											<option value="Admin">Admin</option>
											<option value="Manager">Manager</option>
											<option value="Staff">Staff</option>
											<option value="Accountant">Accountant</option>
											<option value="Receiptionalist">Receiptionalist</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Image</label>
										<div class="custom-file mb-3">
											<input type="file" class="custom-file-input" id="customFile" name="filename" onchange="previewImage(event)">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
										<img src="assets/img/default.jpg" alt="" id="staffImg" style="width: 150px; height: 150px; border: solid 1px; border-radius: 50%; object-fit: cover;">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary buttonedit ml-2">Add Staff</button>
						</form>
					</div>
				<?php } else { ?>
						<div class="col-lg-12">
							User Not Eligible to register new staff.
						</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script>
				function previewImage(event) {
  			var input = event.target;
  			var img = document.getElementById('staffImg');
  			var reader = new FileReader();

  			reader.onload = function(){
    		img.src = reader.result;
  			};

  			reader.readAsDataURL(input.files[0]);
		}
	</script>
</body>

</html>
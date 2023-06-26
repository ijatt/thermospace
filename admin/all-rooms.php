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

$roomQuery = "SELECT * FROM rooms";
$roomResult = mysqli_query($conn, $roomQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Thermospace</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
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
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="<?php echo $staffData['imgURL']; ?>" width="40" height="40" alt="profile-pic" style="object-fit:cover"></span> </a>
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
								<li><a class="active" href="all-rooms.php">All Rooms </a></li>
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
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">All Rooms</h4> <a href="add-room.php" class="btn btn-primary float-right veiwbutton">Add Room</a> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Room ID</th>
												<th>Room Name</th>
												<th>Room Bed</th>
												<th>Room Bath</th>
												<th>Price Rate</th>
												<th>Times Booked</th>
											</tr>
										</thead>
										<tbody>
										<?php
											while($row = mysqli_fetch_assoc($roomResult)){
												$totalBookSql = "SELECT IFNULL(count(r.reserveID), 0) as total_bookings from rooms c LEFT JOIN reservation r ON c.roomID = r.roomID where c.roomID = '$row[roomID]' GROUP BY c.roomID;";
												$totalResult = mysqli_query($conn, $totalBookSql);
												$totalBook = mysqli_fetch_assoc($totalResult);

												echo '<tr>';
												echo '<td class="text-center">'.$row['roomID'].'</td>';
												echo '<td>
														<h2 class="table-avatar">
														<a class="avatar avatar-sm mr-2"><img style="width: 38px !important; height="38px !important;" class="avatar-img rounded-circle" src="../'.$row['roomImg'].'" alt="User Image"></a>
														<a>'.$row['roomName'].'</a>
														</h2>
													  </td>';
												echo '<td>'.$row['roomBed'].'</td>';
												echo '<td>'.$row['roomBath'].'</td>';
												echo '<td>RM '.$row['roomPrice'].'</td>';
												echo '<td class="text-center">'.$totalBook['total_bookings'].'</td>';
												echo '<td class="text-right">
														<div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
															<div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-room.php?roomID='.$row['roomID'].'"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset" data-roomid="'.$row['roomID'].'"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
														</div>
													  </td>';
												echo '</tr>';
											}
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<a class="btn btn-danger">Delete</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script>

		$(document).ready(function(){
			$('#delete_asset').on('show.bs.modal', function(e) {
			var button = $(e.relatedTarget);
			console.log(button);
			console.log(button[0].outerHTML);
			var reserveID = button.data('roomid');
			console.log(reserveID);

			var deleteURL = 'delete-room.php?roomID='+reserveID;
			$('#delete_asset .btn-danger').attr('href', deleteURL);
			});
		});
	</script>
</body>

</html>
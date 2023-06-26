<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
  $email = $_SESSION['email'];
  require_once 'connect.php';

  $sql = "SELECT * FROM staff WHERE staffEmail = '$email'";
  $result = mysqli_query($conn, $sql);
  if($result && mysqli_num_rows($result) === 1){
    $staffData = mysqli_fetch_assoc($result);
    $staffID = $staffData['staffID'];
  }
}
else{
  header('Location: login.php');
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Admin Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/feathericon.min.css" />
    <link rel="stylesheet" href="assets/plugins/morris/morris.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo"> 
                    <img src="assets/img/hotel_logo.png" width="50" height="70"alt="logo">
                    <span class="logoclass">Thermospace</span>
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="assets/img/hotel_logo.png" alt="Logo" width="30"height="30">
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="<?php echo $staffData['imgURL']; ?>" width="40" height="40" alt="profile-pic" style="object-fit: cover;">
                            <span class="status online"></span> 
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm"> <img src="<?php echo $staffData['imgURL']; ?>"
                                    alt="User Image" class="avatar-img rounded-circle"
                                    style="width: 38px !important height: 38px !important object-fit: cover;"> </div>
                            <div class="user-text">
                                <h6><?php echo $staffData['staffName']; ?></h6>
                                <p class="text-muted mb-0"><?php echo $staffData['staffPosition']; ?></p>
                            </div>
                        </div> <a class="dropdown-item" href="profile.php">My Profile</a> <a class="dropdown-item"
                            href="index.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active"> <a href="homepage.php"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>
                        <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="all-booking.php"> All Booking </a></li>
                                <li><a href="edit-booking.php"> Edit Booking </a></li>
                                <li><a href="add-booking.php"> Add Booking </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="all-customer.php"> All customers </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Rooms </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="all-rooms.php">All Rooms </a></li>
                                <li><a href="edit-room.php"> Edit Rooms </a></li>
                                <li><a href="add-room.php"> Add Rooms </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Staff </span> <span
                                    class="menu-arrow"></span></a>
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
                <div class="page-header mt-5">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="homepage.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="<?php echo $staffData['imgURL']; ?>"
                                            style="width: 120px !important; height: 120px !important; object-fit: cover;" />
                                    </a>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-3"><?php echo $staffData['staffName']; ?></h4>
                                    <h6 class="text-muted mt-1"><?php echo $staffData['staffPosition']; ?></h6>
                                    <div class="user-Location mt-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $staffData['city']; ?>, <?php echo $staffData['country']; ?>
                                    </div>
                                    <div class="about-text">
                                        <?php echo $staffData['staffAbout']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content profile-tab-cont">
                            <div class="tab-pane fade show active" id="per_details_tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a class="edit-link" data-toggle="modal"
                                                        href="#edit_personal_details"><i
                                                            class="fa fa-edit mr-1"></i>Edit</a>
                                                </h5>
                                                <div class="row mt-5">
                                                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                        Name
                                                    </p>
                                                    <p class="col-sm-9"><?php echo $staffData['staffName']; ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                        Date of Birth
                                                    </p>
                                                    <p class="col-sm-9"><?php echo $staffData['staffDOB']; ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                        Email ID
                                                    </p>
                                                    <p class="col-sm-9">
                                                        <?php echo $staffData['staffEmail']; ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                        Mobile
                                                    </p>
                                                    <p class="col-sm-9"><?php echo $staffData['staffPhone']; ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-sm-right mb-0">Address</p>
                                                    <p class="col-sm-9 mb-0">
                                                        <?php echo $staffData['address']; ?>, <br />
                                                        <?php echo $staffData['postcode']; ?>
                                                        <?php echo $staffData['city']; ?>,<br />
                                                        <?php echo $staffData['country']; ?>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edit_personal_details" aria-hidden="true"
                                            role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Personal Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="update-profile.php?staffID=<?php echo $staffData['staffID']; ?>"
                                                            method="post">
                                                            <div class="row form-row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" class="form-control"
                                                                            name="staffName"
                                                                            value="<?php echo $staffData['staffName']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control"
                                                                                name="staffDOB"
                                                                                value="<?php echo $staffData['staffDOB']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Email ID</label>
                                                                        <input type="email" class="form-control"
                                                                            name="staffEmail"
                                                                            value="<?php echo $staffData['staffEmail']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" class="form-control"
                                                                            name="staffPhone"
                                                                            value="<?php echo $staffData['staffPhone']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>About</label>
                                                                        <input type="textarea" class="form-control"
                                                                            rows="2" name="staffAbout" width="100%"
                                                                            value="<?php echo $staffData['staffAbout']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h5 class="form-title">
                                                                        <span>Address</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <input type="text" class="form-control"
                                                                            name="address"
                                                                            value="<?php echo $staffData['address']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <input type="text" class="form-control"
                                                                            name="city"
                                                                            value="<?php echo $staffData['city']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>State</label>
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Zip Code</label>
                                                                        <input type="text" class="form-control"
                                                                            name="postcode"
                                                                            value="<?php echo $staffData['postcode']; ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <input type="text" class="form-control"
                                                                            value="Malaysia" name="country"
                                                                            value="<?php echo $staffData['country']; ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-block">
                                                                Save Changes
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
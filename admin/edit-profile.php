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
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="<?php echo $staffData['imgURL']; ?>" width="40" height="40" alt="profile-pic"></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="<?php echo $staffData['imgURL']; ?>" alt="User Image" class="avatar-img rounded-circle"> </div>
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
                <h3 class="page-title mt-5">Edit Profile</h3>
              </div>
            </div>
          </div>
          <div class="box inform_css">
            <p class="card-title title_menu">Basic Informations</p>
            <div class="row">
              <div class="col-lg-12">
                <form>
                  <div class="row formtype">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>First Name</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Cristina "
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Groves"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Birth Date</label>
                        <div class="cal-icon">
                          <input
                            type="text"
                            class="form-control datetimepicker"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" id="sel1" name="sellist1">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="box inform_css mt-3">
            <p class="card-title title_menu">Contact Informations</p>
            <div class="row">
              <div class="col-lg-12">
                <form>
                  <div class="row formtype">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input
                          type="text"
                          class="form-control"
                          value="4487 Snowbird Lane"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>State</label>
                        <input
                          class="form-control"
                          type="text"
                          value="New York"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Country</label>
                        <input
                          class="form-control"
                          type="text"
                          value="united States"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Pincode</label>
                        <input class="form-control" type="text" value="10523" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input
                          class="form-control"
                          type="text"
                          value="631-889-3206"
                        />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="box inform_css mt-3">
            <p class="card-title title_menu">Educational Informations</p>
            <div class="row">
              <div class="col-lg-12">
                <form>
                  <div class="row formtype">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Institution</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Oxford university"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Subject</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Computer Science"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Starting Date</label>
                        <div class="cal-icon">
                          <input
                            type="text"
                            class="form-control datetimepicker"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Complete Date</label>
                        <div class="cal-icon">
                          <input
                            type="text"
                            class="form-control datetimepicker"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Degree</label>
                        <input
                          class="form-control"
                          type="text"
                          value="BE Computer Science"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Grade</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Grade A"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" id="sel2" name="sellist1">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="box inform_css mt-3">
            <p class="card-title title_menu">Experience Informations</p>
            <div class="row">
              <div class="col-lg-12">
                <form>
                  <div class="row formtype">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Company Name</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Digital Devlopment Inc"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Location</label>
                        <input
                          class="form-control"
                          type="text"
                          value="United States"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Job Position</label>
                        <input
                          class="form-control"
                          type="text"
                          value="Web Developer"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Period From</label>
                        <div class="cal-icon">
                          <input
                            type="text"
                            class="form-control datetimepicker"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Period To</label>
                        <div class="cal-icon">
                          <input
                            type="text"
                            class="form-control datetimepicker"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary buttonedit mt-3">
            Save
          </button>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

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

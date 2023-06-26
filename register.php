<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
	<link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body{
            background-color: #FAF2F7;
        }
        .img-account-profile{
            width: 315px;
            height: 315px;
            object-fit: cover;
            border-radius: 50%;
        }

        .alert {
            padding: 20px;
            background-color: #455d58;; /* Red */
            color: white;
            margin-bottom: 15px;
            display: none;
            position: fixed;
            z-index: 10;
            width: 100%;
        }

            /* The close button */
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
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Successfully Register
</div>
<div class="container-xl px-4 mt-4" style="background-color: #FAF2F7">
    <h3 style="color: #455d58">Register</h3>
    <nav class="nav nav-borders">
        <a class="nav-link" style="color: #455d58" href="index.php" target="__blank">Home</a>
        <a class="nav-link" style="color: #455d58" href="rooms.php" target="__blank">Login</a>
    </nav>
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img id="profileImage"class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="upload btn btn-primary" type="button" style="background: #455d58;border: none;color: white:">Upload image</button>
                    <input type="file" style="display: none;">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" name="username">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control" id="inputPassword" type="password" placeholder="Enter your password" name="password">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="firstName">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lastName">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputAddress">Address</label>
                                <input class="form-control" id="inputAddress" type="text" placeholder="Enter your address" name="address">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputCity">City</label>
                                <input class="form-control" id="inputCity" type="text" placeholder="Enter your City" name="city"> 
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="email">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phone">
                            </div>
                            <!-- Form Group (birthday)-->
                        </div>
                        <!-- Save changes button-->
                        <button class="saveChanges btn btn-primary" type="submit" style="background: #455d58;border: none;color: white:">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function showAlert(){
    var alert = document.getElementById("alert");
    alert.style.display = "block";
}



$(document).ready(function() {

    function showAlert(){
        var alert = document.getElementById("alert");
        alert.style.display = "block";
    }
    // Handle the click event on the "Upload image" button
    $('.upload').click(function() {
        // Trigger the file selection dialog
        $('input[type="file"]').click();
    });

    // Handle the file selection event
    $('input[type="file"]').change(function() {
        // Get the selected file
        var file = $(this)[0].files[0];

        // Create a FormData object to send the file
        var formData = new FormData();
        formData.append('profileImage', file);

        // Send an AJAX request to upload.php to handle the file upload
        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Update the 'src' attribute of the <img> tag with the new image path
                var imageUrl = response + '?v=' + new Date().getTime();
                var img = document.getElementById('profileImage');
                img.setAttribute('src', response);
                console.log("success");
                console.log(response);
            },
            error: function() {
                console.log('Error uploading file.');
            }
        });
    });

    function saveImageURL(imageUrl) {
        var username = $('#inputUsername').val();
        var password = $('#inputPassword').val();
        var firstName = $('#inputFirstName').val();
        var lastName = $('#inputLastName').val();
        var address = $('#inputAddress').val();
        var city = $('#inputCity').val();
        var email = $('#inputEmailAddress').val();
        var phoneNumber = $('#inputPhone').val();

        // Create an object with the form data
        var data = {
            username: username,
            password: password,
            firstName: firstName,
            lastName: lastName,
            address: address,
            city: city,
            email: email,
            phoneNumber: phoneNumber,
            imageUrl: imageUrl
        };

        // Send an AJAX request to save the data to the database
        $.ajax({
            url: 'save-register.php',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                console.log('Data saved successfully.');
            },
            error: function() {
                console.log('Error saving data.');
            }
        });
    }

    // Handle the click event on the "Save changes" button
    $('form').submit(function(event) {
        // Get the image URL
        var imageUrl = $('#profileImage').attr('src');

        // Save the image URL to the database
        saveImageURL(imageUrl);
        showAlert();
        event.preventDefault();
        setTimeout(function() {
            var username = $('#inputUsername').val();
            window.location.href = 'profile.php?registered=true&username=' + username;
        }, 2000);
    });
});
</script>
</body>
</html>
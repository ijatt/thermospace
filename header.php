<?php
    require_once 'connect.php';
    session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) === 1) {
                    $_SESSION['loggedin'] = true;
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['picURL'] = $row['picURL'];
                    $_SESSION['username'] = $username;
                } else {
                    $error = "Wrong username or password";
                    $inputClass = "error-input";
                    $currentURL = $_SERVER['REQUEST_URI'];
                    if(str_contains($currentURL, '?')){
                        header('location: '.$currentURL.'&function=openLoginForm&errorLogin=true');
                    }
                    else{
                    header('location: '.$currentURL.'?function=openLoginForm&errorLogin=true');
                    }
                }
            } else {
                echo "Error executing the SQL query: " . mysqli_error($conn);
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <style>
    .alert {
        padding: 20px;
        background-color: #455d58;
        ;
        /* Red */
        color: white;
        margin-bottom: 15px;
        display: none;
        position: fixed;
        top: 10px;
        z-index: 10;
        width: 100%;
        font-size: 16px;
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

    .error-input {
        border: 1px solid red;
    }
    </style>
</head>

<body>
    <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && !isset($_SESSION['alert_shown'])) {
    echo '<div class="alert" id="alert">';
    echo '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
    echo 'Welcome ' . $_SESSION['username'];
    echo '</div>';
    $_SESSION['alert_shown'] = true;
}
?>
    <div class="container">
        <nav class="navbar">
            <a class="logo" href="index.php">Thermospace</a>
            <input type="checkbox" id="check">
            <label for="check">
                <i class="fas fa-bars" id="open"></i>
                <i class="fas fa-times" id="close"></i>
            </label>
            <ul class="nav-list">
                <li class="nav-item"><a href="rooms.php" class="nav-link">Rooms</a></li>
                <li class="nav-item"><a href="restaurant.php" class="nav-link">Restaurant</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item">
                    <a id="login-link" onclick="openLoginForm()" class="nav-link book-btn">Login</a>
                    <img id="user-profile" onclick="profile()"
                        src="<?php echo isset($_SESSION['picURL']) ? $_SESSION['picURL'] : ''; ?>" alt="">
                </li>
            </ul>
        </nav>
    </div>
    <div class="popup-overlay"></div>
    <div class="popup">
        <div class="popup-close" onclick="closeLoginForm()">&times;</div>
        <form action="" method="POST" class="login">
            <div class="header">
                <h2><i class="fas fa-user"></i> Login</h2>
            </div>
            <div class="element">
                <label for="username" id="username-label">Username</label>
                <input type="text" id="username" name="username"
                    class="<?php echo isset($inputClass) ? $inputClass : ''; ?>">
            </div>
            <div class="element">
                <label for="password" id="password-label">Password</label>
                <input type="password" id="password" name="password"
                    class="<?php echo isset($inputClass) ? $inputClass : ''; ?>">
            </div>
            <div class="element">
                <button type="submit" class="book-btn">Login</i></button>
            </div>
        </form>
        <p class="no-account">Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <script>
    function error() {
        document.getElementById("username").style.border = "1px solid red";
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById('username-label').style.color = 'red';
        document.getElementById('password-label').style.color = 'red';
        document.getElementById('username-label').innerHTML = 'Invalid Username or Password';
    }

    function openLoginForm() {
        document.body.classList.add("showLoginForm");
    }

    function closeLoginForm() {
        document.body.classList.remove("showLoginForm");
    }

    function showProfile() {
        console.log("mantap");
        var loginLink = document.getElementById("login-link");
        var userProfile = document.getElementById("user-profile");
        loginLink.style.display = "none";
        userProfile.style.display = "block";
    }

    function profile() {
        window.location.href = 'profile.php';
        /*var button = document.getElementById("log-out");
        if(button.style.display === "none"){
            button.style.display = "inline-block";
        }
        else{
            button.style.display = "none";
        }*/
    }

    function showAlert() {
        var alert = document.getElementById("alert");
        alert.style.display = "block";
    }
    const urlParams = new URLSearchParams(window.location.search);
    const functionName = urlParams.get('function');
    const errorLogin = urlParams.get('errorLogin');
    if (functionName === 'openLoginForm') {
        openLoginForm();

    }
    if (errorLogin == 'true') {
        error();
    }
    </script>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<script>closeLoginForm();</script>';
        echo '<script>showProfile();</script>';
        echo '<script>showAlert();</script>';
    }
    ?>
</body>
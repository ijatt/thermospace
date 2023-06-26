<?php
    include_once 'header.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Thermospace</title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <!-- NAVBAR -->


    <!-- INFO SECTION -->
    <section id="info" class="info">
        <div class="container">
            <div class="row">
                <div class="col-2 padding-right">
                    <h2 class="text-green">Thermospace</h2>
                    <p class="info-text text-green">Welcome to the website of our hotel! We are glad to provide you with a really unforgettable experience during your stay. Our hotel is known for its exceptional hospitality, making every visitor feel welcomed and pampered from the time they arrive. Our property is in an excellent location, with spectacular views and easy access to famous attractions. We respond to every traveler's needs and tastes with a diverse selection of nicely fitted rooms and suites.</p>
                    <p class="info-text text-green">Our attentive staff is dedicated to offering top-notch service and making your stay unforgettable, whether you're here for business or pleasure. Indulge in our great dining selections, relax in our magnificent spa, or make use of our cutting-edge facilities. We encourage you to experience the ideal balance of comfort, style, and convenience at our hotel.</p>
                </div>
                <div class="col-2 image-group">
                    <img src="images/about-img-1.jpg" alt="image">
                    <img src="images/about-img-2.jpg" alt="image">
                </div>
            </div>
        </div>
    </section>

    <!-- EXCELLENT SERVICE SECTION-->
    <section class="excellent-service">
        <div class="container">
            <div class="headlines">
                <div>
                    <h2 class="sub-headline">
                        Excellent
                    </h2>
                </div>
                <div>
                    <h2>Service</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features">
        <div class="container container-medium">
            <div class="row">
                <div class="col-3">
                    <i class="fas fa-gift"></i>
                    <h4>Special Offers</h4>
                    <p>Our attentive staff is dedicated to offering top-notch service and making your stay unforgettable, whether you're here for business or pleasure.</p>
                </div>
                <div class="col-3">
                    <i class="fas fa-bed"></i>
                    <h4>Orthopedic Beds</h4>
                    <p>Relax and unwind in our spacious and well-appointed rooms, featuring modern amenities and
                        comfortable beds for a restful stay.</p>
                </div>
                <div class="col-3">
                    <i class="fas fa-utensils"></i>
                    <h4>Amazing Food</h4>
                    <p>Indulge in a culinary journey at our hotel's restaurant, where our talented chefs create
                        mouthwatering dishes using the finest local and international ingredients.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <i class="fas fa-trophy"></i>
                    <h4>High Rating</h4>
                    <p>
Discover our high-rated hotel with exceptional service and luxurious amenities, and take advantage of our exclusive special offers for an unforgettable stay.</p>
                </div>
                <div class="col-3">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Best Locations</h4>
                    <p>Located in Petaling Jaya, our hotel is very easy to access and very fast you can find. Just Google or Waze Thermospace Hotel and there you go.</p>
                </div>
                <div class="col-3">
                    <i class="fas fa-credit-card"></i>
                    <h4>Payment Options</h4>
                    <p>We offer various payment options to ensure a hassle-free booking and checkout process, including
                        credit cards, online payments, and cash transactions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- BRANDS DISPLAY SECTION -->
    <section class="brands">
        <div class="container">
            <div class="slider">
                <div class="slider-box">
                    <img src="images/brands-1.png" alt="brands">
                </div>
                <div class="slider-box">
                    <img src="images/brands-2.png" alt="brands">
                </div>
                <div class="slider-box">
                    <img src="images/brands-3.png" alt="brands">
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php include_once 'footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>
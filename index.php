<?php
    include 'connect.php';
    include_once 'header.php';

    $sql = "SELECT r.*, c.* FROM reviews r, customers c WHERE r.customerID = c.customerID";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thermospace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div id="hero" class="hero">
            <div class="container">
                <div class="hero__text-box">
                    <h1 class="hero__text">
                        <span class="hero__text-top">Luxury</span>
                        <span class="hero__text-bottom">Comfort</span>
                    </h1>
                    <button class="btn btn-green" id="book-btn">Book a Room</button>
                </div>
            </div>
        </div>
    </header>


    <main>
        <!-- INFO SECTION -->
        <section class="info">
            <div class="container">
                <div class="row">
                    <div class="col-2 padding-right">
                        <p class="info-text text-green">Welcome to Thermospace Hotel, where unforgettable experiences
                            await you. Discover the perfect blend of luxury, comfort and exceptional service that will
                            make your stay truly memorable.</p>
                        <p class="info-text text-green">Indulge in our spacious and beautifully appointed
                            accommodations, designed with your utmost comfort in mind. Each room is a sanctuary of
                            relaxation, offering modern amenities and breathtaking views that will leave you in awe.</p>
                    </div>
                    <div class="col-2 image-group">
                        <img src="images/blog-list-img-1.jpg" alt="image">
                        <img src="images/blog-list-img-2.jpg" alt="image">
                    </div>
                </div>
            </div>
        </section>

        <!-- ROOMS SECTION -->
        <section class="rooms">
            <div class="container">
                <div class="row">
                    <div class="col-2 padding-right">
                        <img src="images/rooms.jpg" alt="image">
                    </div>
                    <div class="col-2">
                        <div class="text-box">
                            <h2 class="headline">Rooms</h2>
                            <p>Experience the epitome of luxury and comfort in our exquisite rooms.</p>
                            <a href="rooms.php" class="btn btn-green">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RESTAURANT SECTION -->
        <section class="restaurant">
            <div class="container">
                <div class="row column-reverse">
                    <div class="col-2 padding-right">
                        <div class="text-box">
                            <h2>Restaurant</h2>
                            <p>Delight your taste buds with our delectable culinary creations prepared by our
                                world-class chefs.</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="images/restaurant.jpg" alt="image">
                    </div>
                </div>
            </div>
        </section>

        <!-- SPA SECTION -->

        <!-- TESTIMONIAL SECTION -->
        <section class="testimonials">
            <div class="container">
                <h2 class="heading-text">Customers Reviews</h2>
                <div class="slider">
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <div class="slider-box">
                        <i class="fas fa-quote-left text-green"></i>
                        <p><?php echo $row['comments']?></p>
                        <div class="rating">
                            <?php $i = 0; ?>
                            <?php while($i < $row['ratings']){?>
                            <i class="fas fa-star"></i>
                            <?php $i++;?>
                            <?php }?>
                        </div>
                        <img src="<?php echo $row['picURL'];?>" alt="user"
                            style="width: 50px !important; height: 50px !important; object-fit: cover;">
                        <h3><?php echo $row['firstName'].' '.$row['lastName']?></h3>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER SECTION -->
    <?php include_once 'footer.php';?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/index.js"></script>
    <script>
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
</body>

</html>
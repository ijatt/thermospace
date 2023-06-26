<?php
    include_once 'header.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spa - Thermospace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
</head>

<body>
    <!-- NAVBAR -->

    <!-- SPA SECTION -->
    <section id="section-spa" class="section-spa">
        <div class="container">
            <div class="spa-header">
                <i class="fas fa-spa"></i>
                <h2 class="headline">Our Awesome Spa</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut fugiat autem enim porro, molestiae
                    accusamus.</p>
            </div>
        </div>
        <div class="spa-gallery">
            <div class="row">
                <div class="col-3">
                    <img src="images/spa.jpg" alt="spa-image">
                </div>
                <div class="col-3">
                    <img src="images/spa-img-2.jpg" alt="spa-image">
                </div>
                <div class="col-3">
                    <img src="images/spa-img-3.jpg" alt="spa-image">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <img src="images/spa-img-4.jpg" alt="spa-image">
                </div>
                <div class="col-3">
                    <img src="images/spa-img-5.jpg" alt="spa-image">
                </div>
                <div class="col-3">
                    <img src="images/spa-img-6.jpg" alt="spa-image">
                </div>
            </div>
        </div>
        <div class="button-container container">
            <button class="btn btn-white">Book Now</button>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <footer>
        <div class="container">
            <div class="back-to-top">
                <a href="#section-spa"><i class="fas fa-chevron-up"></i></a>
            </div>
            <div class="footer__content row">
                <div class="col-3">
                    <h4>About</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam unde accusantium sit repudiandae
                        incidunt quod eius recusandae blanditiis voluptates consectetur?</p>
                </div>
                <div class="col-3">
                    <h4>Payment Methods</h4>
                    <p>Pay any way you choose, we support all payment options</p>
                    <ul class="payment-methods">
                        <li>
                            <a href="#">
                                <i class="fab fa-paypal"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-cc-visa"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-cc-mastercard"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-apple-pay"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h4>Get Social</h4>
                    <p>Follow us on social media and keep in touch with La Hotel.</p>
                    <ul class="social-icons">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-tripadvisor"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
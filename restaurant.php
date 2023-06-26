<?php
    require_once 'connect.php';
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Thermospace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
</head>

<body>
    <!-- MENU SECTION -->
    <section id="our-menu" class="our-menu">
        <div class="container">
            <div class="menu-header">
                <i class="fas fa-utensils"></i>
                <h2 class="headline">Our Menu</h2>
                <p>
Experience the rich and diverse flavors of Malaysian cuisine through our menu, featuring iconic dishes such as Curry Laksa, Nasi Lemak, Rendang Ayam, and more</p>
            </div>
            <div class="menu-table">
                <div class="row">
                    <div class="col-2">
                        <div>
                            <h3>Malaysian Curry Laksa</h3>
                            <p>Experience the authentic flavors of Malaysia with our aromatic and flavorful Curry Laksa. Savor the rich coconut curry broth filled with noodles, tofu, vegetables, and your choice of protein.</p>
                        </div>
                        <div>
                            <h3>Nasi Lemak</h3>
                            <p>Indulge in the iconic Malaysian dish, Nasi Lemak, featuring fragrant coconut rice served with spicy sambal, crispy anchovies, roasted peanuts, cucumber slices, and a choice of protein. A truly delightful culinary experience.</p>
                        </div>
                        <div>
                            <h3>Rendang Ayam</h3>
                            <p>Taste the tender and aromatic Rendang Ayam, a traditional Malaysian chicken dish cooked in a rich blend of spices and coconut milk. Served with steamed rice, it's a must-try for those seeking an explosion of flavors.</p>
                        </div>
                        <div>
                            <h3>Hainanese Chicken Rice</h3>
                            <p>Delight in the famous Hainanese Chicken Rice, a beloved Malaysian dish featuring tender poached chicken served with fragrant rice cooked in chicken broth. Accompanied by flavorful sauces, it's a true culinary delight.</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <h3>Char Kway Teow</h3>
                            <p>Indulge in the tantalizing flavors of Char Kway Teow, a popular Malaysian stir-fried noodle dish with smoky wok hei. Prepared with flat rice noodles, shrimp, Chinese sausage, bean sprouts, and eggs, it's a must-have for noodle lovers.</p>
                        </div>
                        <div>
                            <h3>Roti Canai</h3>
                            <p>Experience the flaky and delicious Roti Canai, a classic Malaysian flatbread served with a flavorful curry dipping sauce. Enjoy it as a snack or pair it with your favorite curry for a satisfying meal.</p>
                        </div>
                        <div>
                            <h3>Assam Laksa</h3>
                            <p>Explore the tangy and spicy flavors of Assam Laksa, a popular Malaysian noodle soup. This dish features rice noodles in a sour fish-based broth, topped with a variety of vegetables and garnished with fragrant herbs.</p>
                        </div>
                        <div>
                            <h3>Nasi Goreng</h3>
                            <p>Indulge in the aromatic Nasi Goreng, a flavorful Malaysian fried rice dish packed with spices, shrimp, vegetables, and your choice of protein. Served with a fried egg on top, it's a satisfying meal on its own.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-gallery">
                <div class="row">
                    <div class="col-3">
                        <img src="images/curry-laksa-thumb.jpg" alt="menu-image">
                    </div>
                    <div class="col-3">
                        <img src="images/FP-Nasi-lemak-with-all-its-trimmings.jpg" alt="menu-image">
                    </div>
                    <div class="col-3">
                        <img src="images/hdgs-hero.jpg" alt="menu-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php include_once 'footer.php';?>
</body>

</html>
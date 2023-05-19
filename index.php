<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <script src="https://kit.fontawesome.com/8923084387.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Furniture Webstore</title>
</head>

<body>
    <!-- Navbar -->



    <div class="container">
        <div class="header_tag1">
            <h2 class="header_tag" data-text="furniture webshop"> Furniture Webshop </h2>
            
        </div>
        <ul class="social-icons">
            <li class="social-icon-item">
                <a href="#" class="social-icon-link"><i class="fa-brands fa-facebook-square social-icon"></i></a>
            </li>
            <li class="social-icon-item">
                <a href="" class="social-icon-link"><i class="fa-brands fa-twitter-square social-icon"></i></a>
            </li>
            <li class="social-icon-item">
                <a href="" class="social-icon-link"><i class="fa-brands fa-linkedin social-icon"></i></a>
            </li>
            <li class="social-icon-item">
                <a href="" class="social-icon-link"><i class="fa-brands fa-instagram-square social-icon"></i></a>
            </li>
        </ul>
        <nav class="first-nav">
            <ul class="first-nav-list">
                <li class="first-nav-item">
                    <a href="#" class="first-nav-link"><i class="fa-solid fa-heart"></i>Wishlist</a>
                </li>
                <li class="first-nav-item">
                    <a href="#" class="first-nav-link"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
                </li>
                <li class="first-nav-item">
                    <a href="./form.html" class="first-nav-link"><i class="fa-solid fa-truck-fast"></i>Order now</a>
                </li>
                <li class="first-nav-item">
                    <a href="./logout.php" class="first-nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
                </li>

            </ul>
            <!-- SIdebar
                
            end of sidebar -->

        </nav>
        <div class="search">
            <form action="" class="search-form">
                <input type="text" class="search-input" placeholder="Search Here">
                <button type="button" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <nav class="second-nav">
            <ul class="second-nav-list">
                <li class="second-nav-item">
                    <a href="furniture.html" class="second-nav-link"> Furniture</a>
                    <div class="dropdown" id="ch">
                        <ul class="dropdown-first-list">
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Sofas</a>
                            </li>
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Sections</a>
                            </li>
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Daybeds and chaises</a>
                            </li>
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Consolas & Credanzes</a>
                            </li>
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Benches and Ottomans</a>
                            </li>
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Dressers</a>
                            </li>
                            <li class="dropdown-list-item">
                                <a href="" class="dropdown-first-link">Dining Tables</a>
                            </li>
                        </ul>

                        <img src="images/dropdown image.jpg" alt="Dropdown Image" class="dropdown-image">
                    </div>
                </li>
                <li class="second-nav-item">
                    <a href="" class="second-nav-link"> Rooms</a>
                </li>
                <li class="second-nav-item">
                    <a href="#kitchen" class="second-nav-link"> Kitchen</a>
                </li>
                <li class="second-nav-item">
                    <a href="" class="second-nav-link"> Outdoor</a>
                </li>
                <li class="second-nav-item">
                    <a href="#sofa" class="second-nav-link"> Sofas</a>
                </li>
                <li class="second-nav-item">
                    <a href="#bed" class="second-nav-link"> Beds</a>
                </li>
                <li class="second-nav-item">
                    <a href="#window" class="second-nav-link"> Window</a>
                </li>
            </ul>
        </nav>
        <!-- Banner -->
        <section class="banner">
            <div class="banner-content">
                <h1 class="banner-heading"> Great Sale</h1>
                <button class="banner-btn">
                    <span class="banner-btn-txt-1">SHOP NOW</span>
                    <span class="banner-btn-txt-2">It's Interesting</span>
                </button>
            </div>

            <div class="slideshow">
                <button class="slide-btn slide-btn-1"> </button>
                <button class="slide-btn slide-btn-2"> </button>
                <button class="slide-btn slide-btn-3"> </button>
                <button class="slide-btn slide-btn-4"> </button>
                <div class="slideshow-wrapper">
                    <div class="slide">
                        <img src="images/slide1.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="images/slide2.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="images/slide3.webp" alt="">
                    </div>
                    <div class="slide">
                        <img src="images/slide-4.jpg" alt="">
                    </div>
                </div>
            </div>
           
        </section>
        <!-- End of banner -->
    </div>

    <!-- end of navbar -->
    <!-- Main body start -->
    <?php include_once 'connect.php' ?>
    <section class="rooms">
        <div class="common-header">
            <h4 id="bed" class="common-heading"> Available Beds </h4>

            <div class="underline">
                <div class="small-underline"></div>
                <div class="big-underline"></div>
            </div>

        </div>
        <div class="rooms-cart-wrapper">
            <?php
            $sql = "SELECT * FROM `all_beds`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                $_name = $row['bed_name'];
                $_price = $row['price'];
                $_description = $row['description'];
                $_image = $row['image'];
                $_bed_id = $row['bed_id'];


                echo '  <div class="room-cart">
                <img 
               alt="boom" src="images/' . $_image . '" class="room-img">
                <div class="room-cart-content">
                    <h4 class="room-heading">' . $_name . '</h4>
                    <p class="room-cart-par">' . $_description . '</p>
                    <p class="room-price"><s>₹40000</s> ₹' . $_price . '</p>
                    <button class="room-cart-btn"><a style="text-decoration:none; color:#cd7536;"  href="furniture.php?bed_name=' . $_bed_id . '">Shop Now
                    <i class="fas fa-angle-double-right btn-arrow"></i></a>
                    </button>
    
                </div>
            </div>';
            }
            ?>


        </div>
        <div class="rooms-btn-wrapper">
            <button class="rooms-button">Check all beds</button>
        </div>
    </section>

    <section class="rooms">
        <div class="common-header">
            <h4 id="sofa" class="common-heading"> Available Sofas </h4>
            <div class="underline">
                <div class="small-underline"></div>
                <div class="big-underline"></div>
            </div>
        </div>
        <div class="rooms-cart-wrapper">

            <?php
            $sql = "SELECT * FROM `all_sofas`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                $_name = $row['sofa_name'];
                $_price = $row['price'];
                $_description = $row['description'];
                $_image = $row['image'];
                $_bed_id = $row['sofa_id'];

                echo '  <div class="room-cart">
                <img alt="boom" src="images/' . $_image . '"  class="room-img">
                <div class="room-cart-content">
                <h4 class="room-heading">' . $_name . '</h4>
                <p class="room-cart-par">' . $_description . '</p>
                <p class="room-price"><s>₹40000</s> ₹' . $_price . '</p>
                <button class="room-cart-btn"><a style="text-decoration:none; color:#cd7536;" href="sofas.php?bed_name=' . $_bed_id . '">Shop Now
                    <i class="fas fa-angle-double-right btn-arrow"></i></a>
                </button>
            </div>
            </div>';
            }

            ?>

        </div>
        <div class="rooms-btn-wrapper">
            <button class="rooms-button">Check all Sofas</button>
        </div>
    </section>

    <section class="rooms">
        <div class="common-header">
            <h4 id="kitchen" class="common-heading"> Available Kitchen sets </h4>
            <div class="underline">
                <div class="small-underline"></div>
                <div class="big-underline"></div>
            </div>
        </div>
        <div class="rooms-cart-wrapper">

            <?php
            $sql = "SELECT * FROM `kitchen_sets`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                $_name = $row['set_name'];
                $_price = $row['price'];
                $_description = $row['description'];
                $_image = $row['image'];
                $_bed_id = $row['kithcen_id'];

                echo '  <div class="room-cart">
                <img alt="boom" src="images/' . $_image . '"  class="room-img">
                <div class="room-cart-content">
                <h4 class="room-heading">' . $_name . '</h4>
                <p class="room-cart-par">' . $_description . '</p>
                <p class="room-price"><s>₹40000</s> ₹' . $_price . '</p>
                <button class="room-cart-btn"><a style="text-decoration:none; color:#cd7536;" href="kitchen.php?bed_name=' . $_bed_id . '">Shop Now
                    <i class="fas fa-angle-double-right btn-arrow"></i></a>
                </button>

            </div>
            </div>';
            }

            ?>
        </div>
        <div class="rooms-btn-wrapper">
            <button class="rooms-button">Check all Kitchen Furniture</button>
        </div>
    </section>

    <section class="rooms">
        <div class="common-header">
            <h4 id="window" class="common-heading"> Available Window Set </h4>
            <div class="underline">
                <div class="small-underline"></div>
                <div class="big-underline"></div>
            </div>
        </div>
        <div class="rooms-cart-wrapper">
            <?php
            $sql = "SELECT * FROM `window_set`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                $_name = $row['set_name'];
                $_price = $row['price'];
                $_description = $row['description'];
                $_image = $row['image'];
                $_bed_id = $row['window_id'];

                echo '  <div class="room-cart">
                <img alt="boom" src="images/' . $_image . '"  class="room-img">
                <div class="room-cart-content">
                <h4 class="room-heading">' . $_name . '</h4>
                <p class="room-cart-par">' . $_description . '</p>
                <p class="room-price"><s>₹40000</s> ₹' . $_price . '</p>
                <button class="room-cart-btn"><a style="text-decoration:none; color:#cd7536;" href="window.php?bed_name=' . $_bed_id . '">Shop Now
                    <i class="fas fa-angle-double-right btn-arrow"></i></a>
                </button>

            </div>
            </div>';
            }

            ?>
        </div>
        <div class="rooms-btn-wrapper">
            <button class="rooms-button">Check all Sets</button>
        </div>
    </section>
    <!-- feedback section -->
    <section class="rooms">
        <div class="common-header">
            <h4 class="common-heading"> Feedback </h4>
            <div class="underline">
                <div class="small-underline"></div>
                <div class="big-underline"></div>
                <h2 class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <!-- <div class="line"></div> -->
            </div>
            <div class="border"></div>
            <form method="POST" class="footer-form">

                <div class="feedbackform" style="justify-content: center;">
                    <input type="text" class="footer-input" name="$_SESSION['username']" hidden>
                    <input type="text" name="write_feedback" class="footer-input">
                    <input type="submit" class="footer-btn" value="Submit Feedback">
            </form>

            
            <div class="row">
                <?php
                $sql = "SELECT * FROM `user_feedback`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $_name = $row['username'];
                    $_feedback = $row['user_feedback'];
                    // $_image = $row['image'];
                    echo '<div class="col">
                    <div class="testimonial">
                        <img src="images/default_user.png" alt="">
                        <div class="name">' . $_name . '</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>                        
                        <p> ' . $_feedback . ' </p>                       
                    </div>
                </div>
                }';
                }
                ?>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_SESSION['username'];
                $usertext = $_POST["write_feedback"];
                if (empty($_POST["write_feedback"])) {
                    echo  "<h3> Write a feedback</h3>";
                } else {
                    $sql3 = "INSERT INTO `user_feedback` (`username`, `user_feedback`) VALUES ('$username', '$usertext');";
                    $result = mysqli_query($conn, $sql3);
                }
            }
            ?>
        </div>

    </section>
    <!-- end of feedback section -->

    <!-- Main body end -->

    <!-- footer -->
    <footer class="footer">
        <div class="main-part">
            <div class="footer-list-wrapper">
                <h3 class="footer-header">Furniture Store</h3>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list">support@ourstore.com</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list"> Mumbai, street-123</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list">+22 2387 3298</a>

                    </li>
                </ul>
            </div>
            <div class="footer-list-wrapper">
                <h3 class="footer-header">Explore</h3>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list">Home</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="./aboutus.html" target="_blank" class="footer-link-list">About Us</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list">Rooms</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list">Events</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <a href="#" class="footer-link-list">Customers</a>

                    </li>
                </ul>
                <ul class="footer-list">
                    <li class="footer-list-item">
                        <!-- <a href="#" class="footer-link-list"></a> -->
                        <a class="footer-link-list" href="www.google.com">Contact</a>

                    </li>
                </ul>
            </div>
            <div class="contact">
                <h3 class="footer-header">Queries</h3>
                <p>Write your queries and demands here.</p>
                <form class="footer-form" method="POST" action="query.php">
                    <input type="text" class="footer-input" name="$_SESSION['username']" hidden>
                    <input type="text" name="query" class="footer-input" placeholder="text your query...">
                    <button type="submit" name="save_select" class="footer-btn">Submit</button>
                </form>
            </div>
        </div>
    </footer>
    <!-- end of footer -->
</body>

</html>
<?php
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <base href="http://localhost/xshop/" target="_parent">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="public/js/jquery.js"></script>
    <link rel="stylesheet" href="public/themify-icons/themify-icons.css">
    <link rel="icon" type="image/x-icon" href="./public/images/title.ico">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/product.css">
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- <link rel="stylesheet" href="public/css/details.css"> -->
    <!-- CSS only -->
    <title>Xshop</title>
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="heading_header container">
                <div class="icon_header_search">
                    <input class="input_header_search" type="text" placeholder="Search...">
                    <i class="fa-solid fa-magnifying-glass header_icon_search"></i>
                    <div class="drop_down_search">
                        <!-- <div class="product_search_item">
                            <a href="" class="product_search_item_link">
                                <img src="https://images.unsplash.com/photo-1490730141103-6cac27aaab94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                                <div class="product_search_item_text">
                                    <p>Aó thun tay ngắn In Love</p>
                                    <span>232.433d</span>
                                </div>
                            </a>
                            <a href="" class="product_search_item_link">
                                <img src="https://images.unsplash.com/photo-1490730141103-6cac27aaab94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                                <div class="product_search_item_text">
                                    <p>Aó thun tay ngắn In Love</p>
                                    <span>232.433d</span>
                                </div>
                            </a>
                            <a href="" class="product_search_item_link">
                                <img src="https://images.unsplash.com/photo-1490730141103-6cac27aaab94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                                <div class="product_search_item_text">
                                    <p>Aó thun tay ngắn In Love</p>
                                    <span>232.433d</span>
                                </div>
                            </a>
                        </div> -->
                        <div class="dropdown_skeleton">
                            <div class="product_search_item_skeleton">
                                <div class="skeleton_img skeleton"></div>
                                <div class="skeleton_text">
                                    <p class="skeleton"></p>
                                    <span class="skeleton"></span>
                                    <span class="skeleton"></span>
                                </div>
                            </div>
                            <div class="product_search_item_skeleton">
                                <div class="skeleton_img skeleton"></div>
                                <div class="skeleton_text">
                                    <p class="skeleton"></p>
                                    <span class="skeleton"></span>
                                    <span class="skeleton"></span>
                                </div>
                            </div>
                            <div class="product_search_item_skeleton">
                                <div class="skeleton_img skeleton"></div>
                                <div class="skeleton_text">
                                    <p class="skeleton"></p>
                                    <span class="skeleton"></span>
                                    <span class="skeleton"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header_logo">
                    <a href="Home"><img src="./public/images/xshop.png" alt=""></a>
                </div>
                <div class="icon_header_right">
                    <?php
                    if (empty($user)) {
                    ?>
                        <div class="header_flex">
                            <i class="fa-solid fa-user"></i>
                            <a href="Login">
                                <p>Account</p>
                            </a>
                        </div>
                        <div class="header_flex">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <p>Shoping</p>
                        </div>
                    <?php
                    }
                    if (!empty($user)) {
                    ?>
                        <div class="header_flex">
                            <i class="fa-solid fa-user"></i>
                            <?php
                            if ($user['chucVu'] == 1) {
                            ?>

                                <a href="AddProduct">
                                    <p><?= $user['userName'] ?></p>
                                </a>
                            <?php
                            } else {
                            ?>
                                <a href="profile">
                                    <p><?= $user['userName'] ?></p>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="header_flex">
                            <i class="fa-solid fa-power-off"></i>
                            <a href="LogOut">
                                <p>Log Out</p>
                            </a>
                        </div>
                        <div class="header_flex">
                            <!-- $data['amountCart'] -->
                            <div class="sl_item"><?= $data['amountCart'][0] ?></div>
                            <i class="fa-solid fa-bag-shopping"></i>
                            <a href="./Cart">
                                <p>Shoping</p>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
            <nav class="list_menu container">
                <ul class="wrap_link_menu">
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Jewelry & Accessories</a>
                    </li>
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Clothing & Shoes</a>
                    </li>
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Home & Living</a>
                    </li>
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Wedding & Party</a>
                    </li>
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Toys & Entertainment</a>
                    </li>
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Art & Collectibles</a>
                    </li>
                    <li class="menu_item">
                        <a href="Product" class="menu_link">Craft Supplies & Tools</a>
                    </li>
                </ul>
            </nav>
        </header>

        <?php
        require_once "./mvc/views/pages/" . $data['Page'] . ".php"
        ?>
        <footer class="footer">
            <div class="container">
                <div class="top_footer ">
                    <div class="footer_col1">
                        <div class="left_footer_text">
                            <img src="./public/images/xshop.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua</p>
                        <div class="footer_icon">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin"></i>
                            <i class="fa-brands fa-dribbble"></i>
                        </div>
                    </div>
                    <div class="footer_col">
                        <h2>CATALOG</h2>
                        <div class="item_menu">
                            <p>Necklaces</p>
                            <p>Hoodies</p>
                            <p>Jewelry Box</p>
                            <p>T-shirt</p>
                            <p>Jacket</p>
                        </div>
                    </div>
                    <div class="footer_col">
                        <h2>ABOUT US</h2>
                        <div class="item_menu">
                            <p>Our Producers</p>
                            <p>Sitemap</p>
                            <p>FAQ</p>
                            <p>About Us</p>
                            <p>Terms & Conditions</p>
                        </div>
                    </div>
                    <div class="footer_col">
                        <h2>CUSTOMER SERVICES</h2>
                        <div class="item_menu">
                            <p>Contact Us</p>
                            <p>Track Your Order</p>
                            <p>Product Care & Repair</p>
                            <p>Book an Appointment</p>
                            <p>Shipping & Returns</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom_footer">
                <div class="container end_footer ">
                    <p>© 2022 Coral , Inc.</p>
                    <img src="./public/images/icons_payment 1.png" alt="">
                    <p class="scroll_top">Scroll to top</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="public/js/jquery.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="public/js/swiper.js"></script>
    <!-- JavaScript Bundle with Popper -->

    <!-- <script src="./js/main.js"></script> -->
</body>

</html>
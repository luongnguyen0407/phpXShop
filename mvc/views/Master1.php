<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <base href="http://localhost/xshop/" target="_parent">
    <link rel="stylesheet" href="public/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="public/css/main.css">

    <!-- CSS only -->
    <title>Iphone</title>
</head>

<body>
    <div class="main">
        <header class="header" data-aos="fade-down">
            <div class="container header-wrapper">
                <a href="Home"><img src="public/images/logotgdd.png" alt="" class="header-logo"></a>
                <nav class="menu">
                    <ul class="menu-main">
                        <li class="menu-item">
                            <a href="Home" class="menu-link">Trang Chủ</a>
                        </li>
                        <li class="menu-item">
                            <a href="Product/1" class="menu-link">Sản Phẩm</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">Chính Sách</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">Liên Hệ</a>
                        </li>
                        <li class="menu-item-btn">
                            <div class="dropdown">
                                <button class="dropdown-btn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./signup.php">Đăng Ký</a></li>
                                    <li><a class="dropdown-item" href="./login.php">Đăng Nhập</a></li>
                                    <!-- <li><a class="dropdown-item" href="./admin/dashboad.php">Admin</a></li>
                                        <li><a class="dropdown-item" href="./cart.php">Giỏ Hàng</a></li>
                                        <li><a class="dropdown-item" href="./logOut.php">Đăng Xuất</a></li> -->
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <i class="fa-solid fa-bars bar"></i>
            </div>
        </header>
        <?php
        require_once "./mvc/views/pages/" . $data['Page'] . ".php"
        ?>
        <footer class="footer">
            <div class="container">
                <div class="footer-header ">
                    <div class="footer-action">
                        <i class="ti-truck"></i>
                        <div>
                            <p>Free shipping</p>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                    <div class="footer-action">
                        <i class="ti-headphone"></i>
                        <div>
                            <p>Free shipping</p>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                    <div class="footer-action">
                        <i class="ti-linux"></i>
                        <div>
                            <p>Free shipping</p>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                    <div class="footer-action">
                        <i class="ti-shield"></i>
                        <div>
                            <p>Free shipping</p>
                            <span>Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>
                </div>
                <div class="footer-contact">
                    <ul class="cols">
                        <h3>SUPPORT</h3>
                        <li>Help</li>
                        <li>Contact Us</li>
                        <li>Feedback</li>
                        <li>Unsubscribe</li>
                        <li>Reservations</li>
                    </ul>
                    <ul class="cols">
                        <h3>POLICIES</h3>
                        <li>Privacy Policy</li>
                        <li>Terms of use</li>
                        <li>Gift card conditions</li>
                        <li>Shipping</li>
                        <li>Return</li>
                    </ul>
                    <ul class="cols">
                        <h3>CATEGORIES</h3>
                        <li>Men</li>
                        <li>Women</li>
                        <li>Accessories</li>
                        <li>Shoes</li>
                        <li>Denim</li>
                    </ul>
                    <ul class="cols">
                        <h3>STAY UP TO DATE</h3>
                        <li style="line-height:1.5;margin-bottom:20px ;">Aliquam erat volutpat. Nam dui mi, tincidunt
                            quis, accumsan.</li>
                        <div class="input-mail">
                            <input type="text" placeholder="Enter your email">
                            <i class="ti-email"></i>
                        </div>

                        <li>New UI kits or big discounts. Never spam.</li>

                    </ul>
                </div>
                <div class="footer-end">
                    <p>© 2022 code by luongnguyen</p>
                    <img src="./xshop/public/img/payments.png" alt="">
                </div>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="/xshop/public/js/swiper.js"></script>
    <script src="/xshop/public/js/header.js"></script>
    <!-- JavaScript Bundle with Popper -->

    <!-- <script src="./js/main.js"></script> -->
</body>

</html>
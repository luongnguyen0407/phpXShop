<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <base href="http://localhost/xshop/" target="_parent">
    <link rel="stylesheet" href="public/themify-icons/themify-icons.css">
    <link rel="icon" type="image/x-icon" href="./public/images/title.ico">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="public/css/admin.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="public/css/modal.css">
    <script defer src="public/js/admin.js"></script>
    <script defer src="public/js/jquery.js"></script>
    <title>Admin</title>
</head>

<body>
    <div class="main-admin">
        <header class="admin-header">
            <div class="container wraper-ad">
                <div class="start-admin">
                    <i class="fa-solid fa-bars"></i>
                    <!-- <img src="../../img/admin.svg" alt=""> -->
                </div>
                <div class="good-admin">
                    <div class="morning">
                        <p class="go-mr"></p>
                        <strong style="color:#ffbc06">Admin</strong>
                    </div>
                    <p>Your performance summary this week</p>
                </div>
                <div class="admin-control">
                    <i class="ti-search"></i>
                    <i class="ti-email"></i>
                    <i class="ti-bell"></i>
                    <li class=" user-dropdown">
                        <div class="avatar-img">
                            <img src="https://images.unsplash.com/photo-1638554115997-8f24575a1a01?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                        </div>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">
                                <img class="img-md" src="https://images.unsplash.com/photo-1638554115997-8f24575a1a01?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Profile image">
                                <p class="profi-name">Luong Nguyen</p>
                                <p class="profi-email">admin@gmail.com</p>
                            </div>
                            <div class="cotrol-user">
                                <a class="dropdown-item">
                                    <i class="fa-solid fa-user"></i> My Profile</a>
                                <a style="color:black;" href="Home" class="dropdown-item"><i class="fa-solid fa-house"></i> Home</a>
                                <a style="color:red;" href="LogOut" class="dropdown-item"><i class="fa-solid fa-power-off"></i> Sign Out</a>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </header>
        <div class="content-memo">
            <aside class="container aside">
                <ul class="list-menu">
                    <li>
                        <a href="Dashboard"><i class="ti-stats-up"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="AddProduct"><i class="ti-pencil-alt"></i> Thêm sản phẩm </a>
                    </li>
                    <li>
                        <a href="ManageProduct"><i class="ti-gallery"></i> Sản Phẩm </a>
                    </li>
                    <li>
                        <a href="ManageOrder"><i class="ti-shopping-cart"></i> Đơn Hàng </a>
                    </li>
                </ul>
            </aside>
            <?php
            require_once "./mvc/views/pages/" . $data['Page'] . ".php"
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
</body>

</html>
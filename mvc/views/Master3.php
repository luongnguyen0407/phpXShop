<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <base href="http://localhost/xshop/" target="_parent">
    <link rel="stylesheet" href="public/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="public/css/main.css">
    <script defer src="public/js/admin.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="main-admin">
        <header class="admin-header">
            <div class="container wraper-ad">
                <div class="start-admin">
                    <i class="fa-solid fa-bars"></i>
                    <img src="../../img/admin.svg" alt="">
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
                                <a style="color:red;" href="../logOut.php" class="dropdown-item"><i class="fa-solid fa-power-off"></i> Sign Out</a>
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
                        <a href="./dashboad.php"><i class="ti-stats-up"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="./listsp.php"><i class="ti-pencil-alt"></i> Thêm sản phẩm </a>
                    </li>
                    <li>
                        <a href="./listsp.php"><i class="ti-gallery"></i> sản phẩm </a>
                    </li>
                    <li>
                        <a href="#"><i class="ti-user"></i> thành viên </a>
                    </li>
                </ul>
            </aside>
            <?php
            require_once "./mvc/views/pages/" . $data['Page'] . ".php"
            ?>
        </div>
    </div>
    <script>
        const inputFile = document.querySelector('.inputFile');
        const imgPew = document.querySelector('.img-pview');
        inputFile.addEventListener("change", (e) => {
            const [file] = e.target.files
            if (file) {
                src = URL.createObjectURL(file)
                imgPew.setAttribute('src', src)
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

</body>

</html>
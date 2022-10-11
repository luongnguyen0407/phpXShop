<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <base href="http://localhost/xshop/" target="_parent">
    <link rel="icon" type="image/x-icon" href="./public/images/title.ico">
    <link rel="stylesheet" href="public/style/auth.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="auth_main">
            <div class="wrapper_form_auth">
                <h2>Your logo</h2>
                <p class="form_auth_title">Login</p>
                <?php
                require_once "./mvc/views/pages/" . $data['Page'] . ".php"
                ?>

            </div>
            <div class="wrapper_img_auth">
                <img src="./public/img/imgauth.png" alt="">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="public/js/auth.js"></script>
</body>

</html>
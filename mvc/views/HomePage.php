<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header {
            background-color: yellow;
            padding: 10px;
        }

        .footer {
            background-color: green;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="header">header</div>
    <div><?php
            require_once "./mvc/views/pages/" . $data['Page'] . ".php"
            ?></div>
    <div class="footer">footer</div>
</body>

</html>
<?php
session_start();
ob_start();
require_once './mvc/Middleware.php';
$myApp = new App();

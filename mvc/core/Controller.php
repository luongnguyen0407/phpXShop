<?php
class Controller
{
    public function callModal($modal)
    {
        if (file_exists("./mvc/models/" . $modal . ".php")) {
            require_once "./mvc/models/" . $modal . ".php";
            return new $modal;
        }
    }
    public function checkUser($isAdmin = false)
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
        if ($isAdmin) {
            return isset($user["chucVu"]) && $user["chucVu"] == 1 ? true : false;
        } else {
            return !empty($user) ? true : false;
        }
    }
    public function callView($view, $data = [])
    {
        if (file_exists("./mvc/views/" . $view . ".php")) {
            require_once "./mvc/views/" . $view . ".php";
        } else {
            require_once "./mvc/views/Master1.php";
        }
    }
}

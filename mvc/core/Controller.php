<?php
class Controller
{
    public function callModal($modal)
    {
        require_once "./mvc/models/" . $modal . ".php";
        return new $modal;
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
        require_once "./mvc/views/" . $view . ".php";
    }
}

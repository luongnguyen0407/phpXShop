<?php
class Controller
{
    public function callModal($modal)
    {
        require_once "./mvc/models/" . $modal . ".php";
        return new $modal;
    }
    public function callView($view, $data = [])
    {
        require_once "./mvc/views/" . $view . ".php";
    }
}

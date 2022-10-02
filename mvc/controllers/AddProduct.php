<?php
class AddProduct extends Controller
{
    public $homeModal;

    function __construct()
    {
        //modal
        $this->homeModal = $this->callModal('ProductModal');
    }

    function Show()
    {
        $this->callView('Master3', [
            'Page' => 'AddSpPage',
        ]);
    }
    function AddSp()
    {
        $error = array();
        $extension = array("jpeg", "jpg", "png", "gif", 'webp');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kq = array();
            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["files"]["name"][$key];
                $file_tmp = $_FILES["files"]["tmp_name"][$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                echo $ext;
                if (in_array($ext, $extension)) {
                    if (!file_exists("./public/imgUp" . $file_name)) {
                        echo 'ok';
                        move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "./public/imgUp/" . $file_name);
                        array_push($kq, $file_name);
                    } else {
                        echo 'no';
                        $filename = basename($file_name, $ext);
                        $newFileName = $filename . time() . "." . $ext;
                        move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "./public/imgUp/" . $newFileName);
                        array_push($kq, $newFileName);
                    }
                } else {
                    array_push($error, "$file_name, ");
                }
            }
            print_r($kq);
        }
    }
}

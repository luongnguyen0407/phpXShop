<?php
class Register extends Controller
{
    public $userModal;

    function __construct()
    {
        //modal
        if ($this->checkUser()) {
            header('location: ./Home');
        }
        $this->userModal = $this->callModal('UserModal');
    }
    function Show()
    {
        $this->callView('Master2', [
            'Page' => 'RegisterPage',
        ]);
    }
    function Auth()
    {
        $err = [];
        if (isset($_POST['btnRegister'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            $ConPassword = $_POST['confirmPass'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err['email'] = "Email không đúng hoặc bị trống";
            }
            if (empty($password)) {
                $err['password'] = 'Bạn Phải Nhập Password';
            }
            if (empty($username)) {
                $err['username'] = 'Bạn Phải Nhập User Name';
            }
            if (!empty($password) && $password != $ConPassword) {
                $err['conPassword'] = 'Password nhập lại không đúng';
            }
            if (empty($err)) {
                // code
                $kq = $this->userModal->findUser($email);
                if ($kq["checkEmail"] == 1) {
                    $err['email'] = "Email đã tồn tại";
                } else {
                    $kq = $this->userModal->registerUser($password, $email, $username);
                    if ($kq) {
                        $_SESSION['user'] = $kq;
                        header('location: ../home');
                    }
                }
            }
            if (!empty($err)) {
                $this->callView('Master2', [
                    'Page' => 'RegisterPage',
                    'Error' => $err,
                    'Email' => $email,
                    'Password' => $password,
                    'Username' => $email,
                    'ConPassword' => $password
                ]);
            }
        }
    }
}

<?php
class Login extends Controller
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
            'Page' => 'LoginPage',
        ]);
    }

    function Auth()
    {
        $err = [];
        if (isset($_POST['btnLogin'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err['email'] = "Email không đúng hoặc bị trống";
            }
            if (empty($password)) {
                $err['password'] = 'Bạn Phải Nhập Password';
            }
            if (empty($err)) {
                // code
                $kq = $this->userModal->findUser($email);
                if ($kq["checkEmail"] == 1) {
                    $checkPass = password_verify($password, $kq["Data"]['password']);
                    if ($checkPass) {
                        $_SESSION['user'] = $kq["Data"];
                        header('location: ./Home');
                        // $kq["Data"]["chucVu"] == 1 ? header('location: ./admin/dashboad.php') : header('location: ./index.php');
                    } else {
                        $err['password'] = "Password hoặc Email không chính xác";
                    }
                } else {
                    $err['email'] = "Password hoặc Email không chính xác";
                }
            }
            if (!empty($err)) {
                $this->callView('Master2', [
                    'Page' => 'LoginPage',
                    'Error' => $err,
                    'Email' => $email,
                    'Password' => $password
                ]);
            }
        }
    }
}

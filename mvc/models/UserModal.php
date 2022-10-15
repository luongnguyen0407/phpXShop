<?php
class UserModal extends DB
{
    public function registerUser($password, $email, $userName)
    {
        //connect db
        $newPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `khachhang`(`email`, `passWord`, `userName`) VALUES ('$email' , '$newPass','$userName')";
        $qr = "SELECT * FROM `khachhang` WHERE email = '$email' ";
        try {
            $this->link->query($sql);
            $resu =  $this->link->query($qr);
            $data = $resu->fetch_assoc();
            return $data;
        } catch (Exception $e) {
            return false;
        }
        // $link->close();
    }
    public function findUser($email)
    {
        //connect db
        $kq = array();
        $qr = "SELECT * FROM `khachhang` WHERE email = '$email' ";
        $resu =  $this->link->query($qr);
        $data = $resu->fetch_assoc();
        $checkEmail = $resu->num_rows;
        $kq = [
            'Data' => $data,
            'checkEmail' => $checkEmail,
        ];
        return $kq;
    }
}

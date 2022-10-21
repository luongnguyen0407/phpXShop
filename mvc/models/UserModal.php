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
    public function addAddress($data, $userId)
    {
        $sql = "INSERT INTO `chitietkh`( `maKH`, `sdt`, `tenKH`, `ward`, `detail_address`, `district`, `province`) 
        VALUES ('" . $userId . "','" . $data["phoneNumber"] . "','" . $data["userName"] . "','" . $data["ward"] . "','" . $data["detailAddressVal"] . "','" . $data["district"] . "','" . $data["province"] . "')";
        $kq = $this->link->query($sql);
        if ($kq) {
            echo true;
        }
        // echo $kq;
    }
    public function getAllAddress($userId)
    {
        $sql = "SELECT * FROM `chitietkh` WHERE maKH = $userId";
        $rows = $this->link->query($sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        echo json_encode($arr);
    }
    public function delAddress($id)
    {
        $sql = "DELETE FROM `chitietkh` WHERE idAddress = $id";
        if ($this->link->query($sql)) {
            # code...
            echo true;
        }
    }
}

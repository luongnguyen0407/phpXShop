<?php
class OrderModal extends DB
{
    public function AddNewOrder($list, $userId, $idAddress, $total)
    {
        $today = date("Y-m-d");
        $iset = "INSERT INTO `hoadon`(`maKhachHang`, `diaChi`, `tongTien`, `ngayXuat`) VALUES ('$userId','$idAddress','$total','$today')";
        if ($this->link->query($iset)) {
            $getID = $this->link->insert_id;
            $insertStr = "";
            foreach ($list as $key => $rows) {
                $insertStr .= "('$getID', '" . $rows["idProduct"] . "', '" . $rows['slProduct'] . "')";
                if ($key != count($list) - 1) {
                    $insertStr .= ",";
                }
            }
            $sql = "INSERT INTO `cthoadon` (`maHoaDon`, `maSanPham`, `soLuong`) VALUES " . $insertStr . " ";
            if ($this->link->query($sql)) {
                echo true;
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }
}

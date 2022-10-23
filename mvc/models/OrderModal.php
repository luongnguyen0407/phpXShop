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

    public function Manage()
    {
        $sql = "SELECT ( SELECT COUNT(*) FROM sanpham) AS SanPham, ( SELECT COUNT(*) FROM khachhang) AS KhachHang, ( SELECT COUNT(*) FROM hoadon) AS HoaDon FROM DUAL;";
        $res = $this->link->query($sql);
        if ($res) {
            echo json_encode(mysqli_fetch_array($res));
        }
    }
    public function getAllBill()
    {
        // $sql = "select hd.maHoaDon, hd.tongTien, hd.ngayXuat, kh.email, ct.province, ct.tenKH, ct.ward, ct.district, ct.detail_address, sp.tenSanPham, cthd.soLuong from khachhang kh left outer join chitietkh ct on kh.idKH = ct.maKh left outer join hoadon hd on ct.idAddress = hd.diaChi left outer join cthoadon cthd on hd.maHoaDon = cthd.maHoaDon left outer join sanpham sp on cthd.maSanPham = sp.maSanPham";
        $sql = "select hd.maHoaDon,ct.sdt, hd.tongTien, hd.ngayXuat, kh.email, ct.province, ct.tenKH, ct.ward, ct.district, ct.detail_address from khachhang kh left outer join chitietkh ct on kh.idKH = ct.maKh left outer join hoadon hd on ct.idAddress = hd.diaChi";
        $res = $this->link->query($sql);
        if ($res) {
            return $res;
        }
    }
}

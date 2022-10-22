<?php
class CartModal extends DB
{
    public function getAmountInCart()
    {
        $sql = "SELECT COUNT(idCart)
        FROM cart";
        // return json_encode($arr);
        if ($this->link->query($sql)) {
            # code...
            return  $this->link->query($sql)->fetch_array(MYSQLI_NUM);
        }
    }
    public function addCart($idProduct, $idKh)
    {
        $kt = "SELECT COUNT(idCart) FROM `cart` WHERE maSanPham = $idProduct AND maKH = $idKh";
        // return $idProduct;
        if ($this->link->query($kt)) {
            # code...
            $res =  $this->link->query($kt)->fetch_array(MYSQLI_NUM)[0];
            if ($res > 0) {
                $sqlUpdate = "UPDATE `cart` SET `soLuong`= `soLuong` + 1 WHERE cart.maSanPham = $idProduct AND cart.maKH = $idKh";
                if ($this->link->query($sqlUpdate)) {
                    return true;
                }
            } else {
                $sql = "INSERT INTO `cart`(`maSanPham`, `maKH`, `soLuong`) VALUES ('$idProduct','$idKh','1')";
                if ($this->link->query($sql)) {
                    return true;
                }
            }
        }
    }
}

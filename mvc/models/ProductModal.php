<?php
class ProductModal extends DB
{
    public function getAllProduct($what = null)
    {
        //connect db
        $sql = isset($what) ? "SELECT * FROM `sanpham` WHERE `maDanhMuc` = '" . $what . "' LIMIT 12 " : 'SELECT * FROM `sanpham`';
        $rows =  mysqli_query($this->link, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    public function getAmountProduct()
    {
        //connect db
        $sql = "SELECT *  FROM sanpham";
        $total =  $this->link->query($sql);
        $total = $total->num_rows;
        return json_encode($total);
    }
    public function queryProduct($id)
    {
        //connect db
        $sql = "SELECT *  FROM sanpham WHERE maSanPham = $id";
        $product =  $this->link->query($sql);
        // return json_encode($total);
        return $product;
    }
    public function getProductLimit($currentPage)
    {
        //connect db
        $sql = "SELECT * FROM sanpham ORDER BY 'maSanPham' ASC LIMIT 8 OFFSET " . $currentPage . "";
        $rows =  mysqli_query($this->link, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    public function addProduct($tenSP, $danhMuc, $mieuTa, $giaSP, $listImg)
    {
        //connect db
        $sql = "INSERT INTO `sanpham`(tenSanPham, maDanhMuc, moTa, giaSanPham, srcImg) VALUES ('$tenSP' , '$danhMuc','$mieuTa', '$giaSP', '$listImg')";
        $qk = $this->link->query($sql);
        if ($qk) {
            return true;
        } else {
            return false;
        }

        // return json_encode($arr);
    }
}

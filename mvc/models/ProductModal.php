<?php
class ProductModal extends DB
{
    public function getAllProduct($what = null, $whatPage = null)
    {
        //connect db
        $sql = isset($what) ? "SELECT * FROM `sanpham` WHERE `maDanhMuc` = '" . $what . "' LIMIT 12 " : 'SELECT * FROM `sanpham`';
        $rows =  mysqli_query($this->link, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        if (!$whatPage) {
            echo json_encode($arr);
        } else {
            return json_encode($arr);
        }
    }
    public function getAmountProduct($byCategory = null)
    {
        //connect db
        $sql = isset($byCategory) ? "SELECT *  FROM sanpham WHERE maDanhMuc = '" . $byCategory . "'" : "SELECT *  FROM sanpham";
        $total =  $this->link->query($sql);
        $total = $total->num_rows;
        echo json_encode($total);
    }
    public function queryProduct($id)
    {
        //connect db
        $sql = "SELECT *  FROM sanpham WHERE maSanPham = $id";
        $product =  $this->link->query($sql);
        // return json_encode($total);
        return $product;
    }
    public function getProductLimit($offset, $limit = 9, $pro = null, $category = null)
    {
        //connect db
        $sql = $category ?  "SELECT * FROM sanpham WHERE maDanhMuc ='" . $category . "' ORDER BY 'maSanPham' ASC LIMIT " . $limit . " OFFSET " . $offset . "" :  "SELECT * FROM sanpham ORDER BY 'maSanPham' ASC LIMIT " . $limit . " OFFSET " . $offset . "";
        $rows =  mysqli_query($this->link, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        if ($pro) {
            echo json_encode($arr);
            // echo $sql;
        } else {
            return json_encode($arr);
        }
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

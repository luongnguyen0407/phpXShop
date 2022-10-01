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
}

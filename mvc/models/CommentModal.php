<?php
class CommentModal extends DB
{
    public function addComment($idKh, $idSp, $comment)
    {
        //connect db
        $today = date("Y-m-d");
        $sql = "INSERT INTO `comment`(userCreate, dateCreate, productId, content) VALUES ( '$idKh', '$today','$idSp', '$comment')";
        // return json_encode($arr);
        $this->link->query($sql);
        echo json_encode($idSp);
    }
    public function getComment($idSp)
    {
        //connect db
        $getComment = "SELECT khachhang.idKH, khachhang.userName, comment.idCm, comment.dateCreate, comment.content FROM comment INNER JOIN khachhang ON comment.userCreate = khachhang.idKH WHERE comment.productId = $idSp ORDER BY comment.dateCreate DESC LIMIT 4";
        // return json_encode($arr);
        $res =  $this->link->query($getComment);
        $kq = array();
        while ($rows = $res->fetch_array()) {
            array_push($kq, $rows);
        }
        $js_array = json_encode($kq);
        echo $js_array;
    }
    public function delComment($idCm)
    {
        //connect db
        $getComment = "DELETE FROM `comment` WHERE idCm = $idCm";
        // return json_encode($arr);
        $res =  $this->link->query($getComment);
        if ($res) {
            echo true;
        } else {
            echo 'error';
        }
    }
}

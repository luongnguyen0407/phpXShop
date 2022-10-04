<?php
class Ajax extends Controller
{
    public $commentModal;

    function __construct()
    {
        //modal
        $this->commentModal = $this->callModal('CommentModal');
    }
    function pushComment()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
        $comment = $_POST['comment'];
        $idProduct = $_POST['idProduct'];
        $this->commentModal->addComment($user['idKH'], $idProduct, $comment);
    }
    function getComment()
    {
        $id = $_POST['id'];
        $this->commentModal->getComment($id);
    }
}

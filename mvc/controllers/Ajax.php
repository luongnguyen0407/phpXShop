<?php
class Ajax extends Controller
{
    public $commentModal;
    public $productModal;

    function __construct()
    {
        //modal
        $this->commentModal = $this->callModal('CommentModal');
        $this->productModal = $this->callModal('ProductModal');
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
    function getProductByCategory()
    {
        if (isset($_POST['category'])) {
            $this->productModal->getAllProduct($_POST['category']);
        } else {
            $this->productModal->getAllProduct();
        }
    }

    function getProductByPagination()
    {
        $offset = $_POST['offset'];
        $this->productModal->getProductLimit($offset, 9, 'product');
    }
    function getAmount()
    {
        $this->productModal->getAmountProduct();
    }
}

<?php
class Ajax extends Controller
{
    public $commentModal;
    public $productModal;
    public $userModal;
    public $cartModal;
    public $orderModal;

    function __construct()
    {
        //modal
        $this->commentModal = $this->callModal('CommentModal');
        $this->productModal = $this->callModal('ProductModal');
        $this->cartModal = $this->callModal('CartModal');
        $this->userModal = $this->callModal('UserModal');
        $this->orderModal = $this->callModal('OrderModal');
    }

    //comment
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

    //profile
    function addAddress()
    {
        if (empty($_POST['data']) || !$this->checkUser()) return;
        $data = json_decode($_POST['data'], true);
        $userId = $_SESSION['user']['idKH'];
        $this->userModal->addAddress($data, $userId);
    }
    function deleteAddress()
    {
        if (empty($_POST['id']) || !$this->checkUser()) return;
        $this->userModal->delAddress($_POST['id']);
    }

    function getAddress()
    {
        if (!$this->checkUser()) return;
        $userId = $_SESSION['user']['idKH'];
        $this->userModal->getAllAddress($userId, null);
    }


    //cart
    function addProductToCart()
    {
        if (empty($_POST['id']) || !$this->checkUser()) return;
        $userId = $_SESSION['user']['idKH'];
        echo $this->cartModal->addCart($_POST['id'], $userId);
    }
    function DeleteProductCart()
    {
        if (empty($_POST['id']) || !$this->checkUser()) return;
        $delAll = empty($_POST['all']) ? null : 'deleteAll';
        $userId = $_SESSION['user']['idKH'];
        echo $this->cartModal->delProduct($_POST['id'], $userId, $delAll);
    }
    function UpdateProductCart()
    {
        if (empty($_POST['idProduct']) || empty($_POST['amount']) || !$this->checkUser()) return;
        $userId = $_SESSION['user']['idKH'];
        echo $this->cartModal->updateProduct($_POST['idProduct'], $userId, $_POST['amount']);
    }
    function OrderProduct()
    {
        if (empty($_POST['data']) || empty($_POST['idAddress']) ||  empty($_POST['total']) || !$this->checkUser()) return;
        // echo '<pre>';
        // print_r($_POST['data']);
        // echo '</pre>';
        // // foreach ($_POST['data'] as &$row) {
        // //     echo $row["idProduct"];
        // // }
        $userId = $_SESSION['user']['idKH'];
        echo $this->orderModal->AddNewOrder($_POST['data'], $userId, $_POST['idAddress'], $_POST['total']);
    }




    //product
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

        $this->productModal->getProductLimit($offset, 6, 'product', isset($_POST['category']) ? $_POST['category'] : null);
    }
    function getAmount()
    {
        if (isset($_POST['byCategory'])) {
            $this->productModal->getAmountProduct($_POST['byCategory']);
        } else {
            $this->productModal->getAmountProduct();
        }
    }

    function deleteProduct()
    {
        if (isset($_POST['id'])) {
            $productDel = $this->productModal->Delete($_POST['id']);
            if (!empty(mysqli_num_rows($productDel))) {
                $imgDel = mysqli_fetch_assoc($productDel);
                $imgDel = json_decode($imgDel['srcImg']);
                foreach ($imgDel as $val) {
                    if (file_exists("./public/imgUp/$val")) {
                        unlink("./public/imgUp/$val");
                    }
                }
            }
        }
    }

    //manage 
    function DashboardManage()
    {
        $this->orderModal->Manage();
    }
}

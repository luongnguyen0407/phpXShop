<?php
class Product extends Controller
{
    public $productModal;
    public $cartModal;

    function __construct()
    {
        //modal
        $this->productModal = $this->callModal('ProductModal');
        $this->cartModal = $this->callModal('CartModal');
    }

    function Show()
    {
        $userId = !empty($_SESSION['user']['idKH']) ? $_SESSION['user']['idKH'] : null;
        $this->callView('Master1', [
            'Page' => 'ProductPage',
            // 'Product' => $this->productModal->getProductLimit()
            'amountCart' => $this->cartModal->getAmountInCart($userId)
        ]);
    }

    function detailProduct($id = null)
    {
        $userId = !empty($_SESSION['user']['idKH']) ? $_SESSION['user']['idKH'] : null;
        if ($id) {
            $qr = $this->productModal->queryProduct($id);
            if (!$qr) return;
            $row = $qr->fetch_array();
            if (!empty($row)) {
                $this->callView('Master1', [
                    'Page' => 'DetailProduct',
                    'Product' => $row,
                    'amountCart' => $this->cartModal->getAmountInCart($userId),
                ]);
            } else {
                echo 'page not po';
            }
        }
    }
}

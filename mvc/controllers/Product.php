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
        $this->callView('Master1', [
            'Page' => 'ProductPage',
            // 'Product' => $this->productModal->getProductLimit()
            'amountCart' => $this->cartModal->getAmountInCart()
        ]);
    }

    function detailProduct($id = null)
    {
        if ($id) {
            $qr = $this->productModal->queryProduct($id);
            $row = $qr->fetch_array();
            if (!empty($row)) {
                $this->callView('Master1', [
                    'Page' => 'DetailProduct',
                    'Product' => $row,
                    'amountCart' => $this->cartModal->getAmountInCart(),
                ]);
            } else {
                echo 'page not po';
            }
        }
    }
}

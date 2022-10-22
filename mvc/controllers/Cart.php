<?php
class Cart extends Controller
{
    public $productModal;
    public $cartModal;

    function __construct()
    {
        //modal
        if (!$this->checkUser()) {
            header('location: ./Login');
        }
        $this->productModal = $this->callModal('ProductModal');
        $this->cartModal = $this->callModal('CartModal');
    }

    function Show()
    {
        $userId = $_SESSION['user']['idKH'];

        $this->callView('Master1', [
            'Page' => 'CartPage',
            'amountCart' => $this->cartModal->getAmountInCart(),
            'listProduct' => $this->cartModal->getAllProduct($userId)
        ]);
    }
}

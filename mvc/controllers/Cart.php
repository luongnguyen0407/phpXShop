<?php
class Cart extends Controller
{
    public $productModal;
    public $cartModal;
    public $userModal;

    function __construct()
    {
        //modal
        if (!$this->checkUser()) {
            header('location: ./Login');
        }
        $this->productModal = $this->callModal('ProductModal');
        $this->cartModal = $this->callModal('CartModal');
        $this->userModal = $this->callModal('UserModal');
    }

    function Show()
    {
        $userId = $_SESSION['user']['idKH'];

        $this->callView('Master1', [
            'Page' => 'CartPage',
            'amountCart' => $this->cartModal->getAmountInCart(),
            'listProduct' => $this->cartModal->getAllProduct($userId),
            'listAddress' => $this->userModal->getAllAddress($userId, 'arr'),
        ]);
    }
}

<?php
class Home extends Controller
{
    public $productModal;

    function __construct()
    {
        //modal
        $this->productModal = $this->callModal('ProductModal');
    }

    function Show()
    {
        $this->callView('Master1', [
            'Page' => 'HomePage',
            'Product' => $this->productModal->getProductLimit(1, 5)
        ]);
    }
    function detailProduct($id)
    {
        echo $id;
    }
}

<?php
class Product extends Controller
{
    public $productModal;

    function __construct()
    {
        //modal
        $this->productModal = $this->callModal('ProductModal');
    }

    function Show($page = null)
    {
        echo $page;
        $this->callView('Master1', [
            'Page' => 'ProductPage',
            'Product' => $this->productModal->getAllProduct()
        ]);
    }
    function detailProduct($id)
    {
        echo $id;
    }
}

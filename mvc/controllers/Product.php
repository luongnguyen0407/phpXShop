<?php
class Product extends Controller
{
    public $productModal;
    function __construct()
    {
        //modal
        $this->productModal = $this->callModal('ProductModal');
    }

    function Show($page = null, $search = null)
    {
        echo $search;
        $total_page = 1;
        $offset = 1;
        if (is_numeric($page)) {
            $offset = ($page - 1) * 8;
            $total =   $this->productModal->getAmountProduct();
            $total_page = ceil($total / 8);
        }
        $this->callView('Master1', [
            'Page' => 'ProductPage',
            'TotalPage' => $total_page,
            'CurrenPage' => $page,
            'Product' => $this->productModal->getProductLimit($offset)
        ]);
    }
    function detailProduct($id = 'hello')
    {

        echo 'ok';
    }
}

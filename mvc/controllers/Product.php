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
        $total_page = 1;
        $offset = 0;
        if (is_numeric($page)) {
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
    function Manage()
    {
        $this->callView('Master3', [
            'Page' => 'ManagePage',
            'Product' => $this->productModal->getAllProduct()
        ]);
    }
    function Page($page = null, $search = null)
    {
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
    function detailProduct($id = null)
    {
        if ($id) {
            $qr = $this->productModal->queryProduct($id);
            $row = $qr->fetch_array();
            if (!empty($row)) {
                $this->callView('Master1', [
                    'Page' => 'DetailProduct',
                    'Product' => $row
                ]);
            } else {
                echo 'page not po';
            }
        }
    }
}

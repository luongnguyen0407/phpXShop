<?php
class Product extends Controller
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
            'Page' => 'ProductPage',
            // 'Product' => $this->productModal->getProductLimit()
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

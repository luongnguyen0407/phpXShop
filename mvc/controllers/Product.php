<?php
class Product extends Controller
{
    function Show()
    {
        $product = $this->callModal('ProductModal');
        echo $product->getAllProduct();
        $total = 1;
        $this->callView('HomePage', [
            'Page' => 'test1',
            'Total' => $total
        ]);
    }
    function detailProduct($id)
    {
        echo $id;
    }
}

<?php
class Home extends Controller
{
    public $homeModal;

    function __construct()
    {
        //modal
        $this->homeModal = $this->callModal('ProductModal');
    }

    function Show()
    {
        $this->callView('Master1', [
            'Page' => 'HomePage',
            'DT' => $this->homeModal->getAllProduct('DT'),
            'LT' => $this->homeModal->getAllProduct('LT')
        ]);
    }
    function detailProduct($id)
    {
        echo $id;
    }
}

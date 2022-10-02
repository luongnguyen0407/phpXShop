<?php
class Admin extends Controller
{
    public $homeModal;

    function __construct()
    {
        //modal
        $this->homeModal = $this->callModal('ProductModal');
    }

    function Show()
    {
        // $this->callView('Master1', [
        //     'Page' => 'HomePage',
        //     'DT' => $this->homeModal->getAllProduct('DT'),
        //     'LT' => $this->homeModal->getAllProduct('LT')
        // ]);
    }
    function AddSp($action = 'dá')
    {
        if (isset($action)) {
            $this->callView('Master3', [
                'Page' => 'AddSpPage',
            ]);
        } else {
            echo 'ok';
        }
    }
}

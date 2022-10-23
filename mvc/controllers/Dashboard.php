<?php
class Dashboard extends Controller
{
    public $productModal;

    function __construct()
    {
        //modal
        if (!$this->checkUser(true)) {
            header('location: ./Home');
        }
        $this->productModal = $this->callModal('ProductModal');
    }
    function Show()
    {
        $this->callView('Master3', [
            'Page' => 'DashboardPage',
        ]);
    }
}

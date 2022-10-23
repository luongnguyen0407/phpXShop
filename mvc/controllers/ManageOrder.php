
<?php
class ManageOrder extends Controller
{
    public $orderModal;

    function __construct()
    {
        //modal
        if (!$this->checkUser(true)) {
            header('location: ./Home');
        }
        $this->orderModal = $this->callModal('OrderModal');
    }
    function Show()
    {
        $res = $this->orderModal->getAllBill();
        $arr = [];
        while ($row = mysqli_fetch_array($res)) {
            $arr[] = $row;
            # code...
        }
        $this->callView('Master3', [
            'Page' => 'ManageOrderPage',
            'listOrder' => $arr,
        ]);
    }
}

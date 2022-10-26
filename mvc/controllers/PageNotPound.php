<?php
class PageNotPound extends Controller
{

    function Show()
    {
        $userId = !empty($_SESSION['user']['idKH']) ? $_SESSION['user']['idKH'] : null;
        $this->callView('', [
            'Page' => 'NotPound',
            'amountCart' => $this->callModal('CartModal')->getAmountInCart($userId)
        ]);
    }
}

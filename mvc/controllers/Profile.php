<?php
class Profile extends Controller
{

    function Show()
    {
        $userId = !empty($_SESSION['user']['idKH']) ? $_SESSION['user']['idKH'] : null;
        $this->callView('Master1', [
            'Page' => 'ProfilePage',
            'amountCart' => $this->callModal('CartModal')->getAmountInCart($userId),
        ]);
    }
}

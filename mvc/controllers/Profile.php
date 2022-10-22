<?php
class Profile extends Controller
{

    function Show()
    {
        $this->callView('Master1', [
            'Page' => 'ProfilePage',
            'amountCart' => $this->callModal('CartModal')->getAmountInCart(),
        ]);
    }
}

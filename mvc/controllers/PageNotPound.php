<?php
class PageNotPound extends Controller
{
    function Show()
    {
        $this->callView('Master1', [
            'Page' => 'NotPound',
        ]);
    }
}

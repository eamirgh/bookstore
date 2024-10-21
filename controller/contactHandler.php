<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/controller/responseHandler.php';

class contactHandler extends responseHandler
{
    function __construct()
    {
        $html = new view(file: APP_DIR . '/view/contact.php');
        $html->title = 'Contact';
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/controller/responseHandler.php';

class indexHandler extends responseHandler
{
    function __construct()
    {
        $books = book::get(10);
        $html = new view(APP_DIR . '/view/index.php');
        $html->title = 'Homepage';
        $html->books = $books;
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

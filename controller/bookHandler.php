<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/controller/responseHandler.php';
require_once APP_DIR . '/controller/errorHandler.php';
require_once APP_DIR . '/model/book.php';

class bookHandler extends responseHandler
{
    function __construct()
    {
        $id = $_GET['bid'] ?? null;
        if (!$id) {
            $err = new errorHandler(500);
            $this->res = $err->response();
            return;
        }
        $book = book::find($id);
        $html = new view(APP_DIR . '/view/book.php');
        $html->book = $book;
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

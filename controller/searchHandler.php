<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/controller/responseHandler.php';

class searchHandler extends responseHandler
{
    function __construct()
    {
        $q = $_GET['q'] ?? null;
        if (!$q) {
            $err = new errorHandler(404);
            $this->res = $err->response();
            return;
        }
        $books = book::search($q);
        $html = new view(APP_DIR . '/view/search.php');
        $html->title = 'search';
        $html->books = $books;
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

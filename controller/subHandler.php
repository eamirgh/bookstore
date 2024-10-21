<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/sub.php';
require_once APP_DIR . '/controller/responseHandler.php';

class subHandler extends responseHandler
{
    function __construct()
    {
        $id = $_GET['sub_id'] ?? null;
        if (!$id) {
            $err = new errorHandler(404);
            $this->res = $err->response();
            return;
        }
        $page = (int) array_key_exists('page', $_GET) ? $_GET['page'] : 1;
        $sub = sub::find($id);
        $books = $sub->books($page);
        $html = new view(APP_DIR . '/view/sub.php');
        $html->title = 'محصولات موضوع ' . $sub->sname;
        $html->sub = $sub;
        $html->books = $books;
        $html->page = $page;
        $html->total = $sub->booksCount();
        $next = 1;
        $prev = 1;
        if ($page > 1) {
            if ($html->total > ($page - 1) * 10) {
                $next++;
            }
            $prev = $page - 1;
        }
        $prev = $prev > 0 ? $prev : 1;
        $html->next = $next;
        $html->prev = $prev;
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

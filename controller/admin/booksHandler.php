<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/model/sub.php';
require_once APP_DIR . '/controller/responseHandler.php';

class booksHandler extends responseHandler
{
    function __construct()
    {
        if (!isset($_SESSION['auth']) || !isset($_SESSION['user'])) {
            header(header: 'Location: ' . APP_URL . '/admin/login');
        }
        $user = unserialize($_SESSION['user']);
        if ($user->role != 'admin') {
            header(header: 'Location: ' . APP_URL . '/admin/login');
        }
        $html = new view(APP_DIR . '/view/admin/book.php');
        $html->title = 'مدیریت کتاب ها';

        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === 'POST') { //create
            book::create($_POST['name'], $_POST['author'], $_POST['price'], $_POST['sid'], $_POST['des'], $_POST['cover'], $_POST['status']);
        }
        $html->books = book::all();
        $html->subs = sub::all();
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

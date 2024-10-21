<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/model/sub.php';
require_once APP_DIR . '/controller/responseHandler.php';

class editBookHandler extends responseHandler
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
        $html = new view(APP_DIR . '/view/admin/edit-book.php');
        $html->title = 'مدیریت کتاب ها';
        $book = book::find($_GET['book_id']);
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === 'POST') { //update
            $book->update($_POST['name'], $_POST['author'], $_POST['price'], $_POST['sid'], $_POST['des'], $_POST['cover'], $_POST['status']);
            header(header: 'Location: ' . APP_URL . '/admin/books');
            die();
        }
        $html->book = $book;
        $html->subs = sub::all();
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

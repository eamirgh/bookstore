<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/controller/responseHandler.php';

class deleteBookHandler extends responseHandler
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
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === 'POST') {
            $book = sub::find($_GET['book_id']);
            $book->delete();
            header('Location: ' . APP_URL . '/admin/books');
            die();
        }
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

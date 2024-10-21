<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/sub.php';
require_once APP_DIR . '/controller/responseHandler.php';

class deleteSubHandler extends responseHandler
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
            $sub = sub::find($_GET['sub_id']);
            $sub->delete();
            header('Location: ' . APP_URL . '/admin/subs');
            die();
        }
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

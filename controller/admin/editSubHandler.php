<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/sub.php';
require_once APP_DIR . '/controller/responseHandler.php';

class editSubHandler extends responseHandler
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
        $html = new view(APP_DIR . '/view/admin/edit-sub.php');
        $html->title = 'مدیریت موضوع ها';
        $sub = sub::find($_GET['sub_id']);

        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === 'POST') { //update
            $sub->update($_POST['name']);
            header('Location: ' . APP_URL . '/admin/subs');
            die();
        }
        $html->sub = $sub;
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

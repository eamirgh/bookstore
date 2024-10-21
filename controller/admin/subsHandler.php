<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/sub.php';
require_once APP_DIR . '/controller/responseHandler.php';

class subsHandler extends responseHandler
{
    function __construct()
    {
        // if (!isset($_SESSION['auth']) || !isset($_SESSION['user'])) {
        //     header(header: 'Location: ' . APP_URL . '/admin/login');
        // }
        // $user = unserialize($_SESSION['user']);
        // if ($user->role != 'admin') {
        //     header(header: 'Location: ' . APP_URL . '/admin/login');
        // }
        $html = new view(APP_DIR . '/view/admin/sub.php');
        $html->title = 'مدیریت موضوع ها';

        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === 'POST') { //create
            sub::create($_POST['name']);
        }
        $html->subs = sub::all();
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/user.php';
require_once APP_DIR . '/controller/responseHandler.php';

class loginHandler extends responseHandler
{
    function __construct()
    {
        $mobile = $_POST['mobile'] ?? null;
        $password = $_POST['password'] ?? null;
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === 'POST') {
            $user = user::findByMobile($mobile);
            $canLogin = $user->password() === $password;
            if ($canLogin) {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = serialize($user);
            }
        }
        $html = new view(APP_DIR . '/view/login.php');
        $html->title = 'ورود';
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

<?php

require_once APP_DIR . '/app/view.php';
require_once APP_DIR . '/model/cart.php';
require_once APP_DIR . '/controller/responseHandler.php';

class cartHandler extends responseHandler
{
    function __construct()
    {
        $id = $_GET['bid'] ?? null;
        $action = $_GET['method'] ?? null;
        $method = $_SERVER["REQUEST_METHOD"];
        $cart = cart::load();
        if ($method === 'POST') {
            $cart = match ($action) {
                'add' => $cart->add($id),
                'minus' => $cart->minus($id),
                'plus' => $cart->plus($id),
                'remove' => $cart->remove($id),
            };
            $cart->save();
        }
        $html = new view(APP_DIR . '/view/cart.php');
        $html->title = 'سبد خرید';
        $html->cart = $cart;
        $this->res =  $html->render();
    }

    public function response(): mixed
    {
        return $this->res;
    }
}

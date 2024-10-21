<?php
define('APP_DIR', __DIR__);
define('APP_URL', 'http://localhost:8080/bookstore');
session_start();
require_once APP_DIR . '/controller/errorHandler.php';
require_once APP_DIR . '/controller/indexHandler.php';
require_once APP_DIR . '/controller/bookHandler.php';
require_once APP_DIR . '/controller/searchHandler.php';
require_once APP_DIR . '/controller/subHandler.php';
require_once APP_DIR . '/controller/cartHandler.php';
require_once APP_DIR . '/controller/loginHandler.php';
require_once APP_DIR . '/controller/contactHandler.php';
require_once APP_DIR . '/controller/admin/subsHandler.php';
require_once APP_DIR . '/controller/admin/deleteSubHandler.php';
require_once APP_DIR . '/controller/admin/editSubHandler.php';
require_once APP_DIR . '/controller/admin/booksHandler.php';
require_once APP_DIR . '/controller/admin/deleteBookHandler.php';
require_once APP_DIR . '/controller/admin/editBookHandler.php';

$domain = 'localhost:8080/bookstore';
$uri = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$params = $_REQUEST;
$path = explode('?', explode($domain, $uri)[1])[0];
$res = match ($path) {
    '/' => new indexHandler,
    '/contact' => new contactHandler,
    '/login' => new loginHandler,
    '/book' => new bookHandler,
    '/sub' => new subHandler,
    '/cart' => new cartHandler,
    '/search' => new searchHandler,
    '/admin/subs' => new subsHandler,
    '/admin/subs/delete' => new deleteSubHandler,
    '/admin/subs/edit' => new editSubHandler,
    '/admin/books' => new booksHandler,
    '/admin/books/delete' => new deleteBookHandler,
    '/admin/books/edit' => new editBookHandler,
    default => new errorHandler(404),
};
echo $res->response();

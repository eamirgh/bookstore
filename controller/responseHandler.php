<?php
require_once APP_DIR.'/app/responser.php';

abstract class responseHandler implements responser{
    protected $res = null;
}
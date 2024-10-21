<?php

require_once APP_DIR.'/app/view.php';
require_once APP_DIR.'/controller/responseHandler.php';

class errorHandler extends responseHandler
{
    function __construct($code = 404){
        $html = new view(APP_DIR.'/view/error.php');
        $html->title = 'ERROR'. $code;
        $html->message =  'oops! '. $html->title;
        $this->res =  $html->render();

    }

    public function response():mixed{
        return $this->res;
    }
    
}

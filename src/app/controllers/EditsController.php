<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
use Phalcon\Http\Request;
use Phalcon\Url;

class EditsController extends Controller
{
    public function editsAction($id)
    {
     $this->view->userid=$id;
    }
}
?>
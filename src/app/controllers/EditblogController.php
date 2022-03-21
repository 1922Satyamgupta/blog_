<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
use Phalcon\Http\Request;
use Phalcon\Url;

class EditblogController extends Controller
{
    public function editblogAction($id)
    {
     $this->view->userid=$id;

     
    }
  }
    ?>
<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
use Phalcon\Http\Request;
use Phalcon\Url;

class EditController extends Controller
{
    public function editAction($id)
    {
     $this->view->userid=$id;

     
    }
  }
    ?>
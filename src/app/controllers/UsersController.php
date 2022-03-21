<?php

use Phalcon\Mvc\Controller;


class UsersController extends Controller
{
    public function indexAction()
    {
       
        $this->view->users = Users::find();
        
        
}
}
?>
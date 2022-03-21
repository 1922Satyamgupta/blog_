<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
use Phalcon\Http\Request;
use Phalcon\Url;

class ContactController extends Controller
{
    public function indexAction()
    {
        $user = new Contacts();
        // print_r($this->request->getPost());
        // die();
            $user->assign(
                $this->request->getPost(),
                [
                    
                    'username',
                    'email',
                    'subject',
                    'message'
                ]
            );
    
            $success = $user->save();
    
            $this->view->success = $success;
    
            if($success) {
                $this->view->message = "Register succesfully";
            } else
               {
                $this->view->message = "Not Register succesfully due to following reason: <br>".implode("<br>", $user->getMessages());
            }

      }
     

    }

     
    ?>
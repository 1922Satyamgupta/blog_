<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $this->view->user = Users::find();
    }
    public function loginAction() {
        // $user = Users::find(["email='$email'"]);
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        
       
        $user = Users::findFirst(['email = "'.$email.'"']);
        //  echo $user->email;
        //  die();
        if ($email == "" && $pass =="") {
         
            echo "insert email and password";
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'users' && $user->status == 'approved') {
            header("Location: http://localhost:8080/blog/index");
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'users' && $user->status == 'unapproved') {
            echo "Your status is not approved. call to admin!!" ;
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'admin' && $user->status == 'approved') {
            header("Location: http://localhost:8080/index");
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'admin' && $user->status == 'unapproved') {
            echo "Your status is not approved. call to admin!!" ;
        }
        else {
            header("Location: http://localhost:8080/login/index");
        }
    }

        
}
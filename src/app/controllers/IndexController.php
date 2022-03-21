<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
use Phalcon\Http\Request;
use Phalcon\Url;

class IndexController extends Controller
{
    public function indexAction()
    {
      $this->view->users = Users::find();
    
    }
    public function editAction($userid) {
      
      $all = Users::findFirstById($userid);
      $request = new Request();
      // $_SERVER['REQUEST_METHOD'] = 'POST';
      $all->username = $request->get('username');
      $all->email= $request->get('email');
      $all->password= $request->get('password');
      $all->role= $request->get('role');
      $all->status= $request->get('status');
      $all->update();
      $this->response->redirect('index');
      
      
    }
    public function deleteAction($id) {
     $User = new Users();
     $User->id = $id;
     $result = $User->delete();
     $this->response->redirect('index');
  }
  public function editsAction($userid) {
      
    $all = Users::findFirstById($userid);
    $request = new Request();
    // $_SERVER['REQUEST_METHOD'] = 'POST';
    $all->username = $request->get('username');
    $all->email= $request->get('email');
    $all->password= $request->get('password');
    $all->update();
    $this->response->redirect('/users/index');
    
    
  }
  public function editpostAction($user_id) {
    $all = Blog::findFirstById($userid);
    $request = new Request();
    // $_SERVER['REQUEST_METHOD'] = 'POST';
    $all->username = $request->get('username');
    $all->email= $request->get('email');
    $all->password= $request->get('password');
    $all->update();
    $this->response->redirect('/users/index');


  }
  public function contactsAction() {
    $this->view->conts = Contacts::find();
  
   }
  public function deletecontactsAction($id) {
    $Cont = new Contacts();
    $Cont->id = $id;
    $results = $Cont->delete();
    $this->response->redirect('index/contacts');
 }
 public function changestatusAction() 
 { 
   $id = $this->request->getPost('approved');
   $this->view->user = Users::findFirstById($id);
   if($this->view->user->status == 'approved') {
     $this->view->user->status = 'unapproved';
   }
   else {
    $this->view->user->status = 'approved';

   }
   $this->view->user->save();

    // $this->response->redirect('index');
    header("Location: http://localhost:8080/");

 }
 
}
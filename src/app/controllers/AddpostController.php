<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
use Phalcon\Http\Request;
use Phalcon\Url;

class AddpostController extends Controller
{
    public function indexAction()
    {
        $this->view->users = Posts::find();

     
    }

  
  public function viewpostAction($id) {
    $all = Posts::findFirstById($id);
    $this->view->post = $all;
  }
   
  public function createpostAction() {
    
   
}
      public function createdAction() {
        $user = new Posts();
        // print_r($this->request->getPost());
        // die();
            $user->assign(
                $this->request->getPost(),
                [
                    'userid',
                    'username',
                    'title',
                    'content'
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
      public function deletepostsAction($id) {
        $User = new Posts();
        $User->id = $id;
        $result = $User->delete();
        $this->response->redirect('/addpost/index');
      }
      public function editblogAction($id) {
        $all = Posts::findFirstById($id);
        $request = new Request();
        // $_SERVER['REQUEST_METHOD'] = 'POST';
        $all->username = $request->get('username');
        $all->title= $request->get('title');
        $all->content= $request->get('content');
        $all->update();
        $this->response->redirect('/addpost/index');
        
        
      }

}
    ?>
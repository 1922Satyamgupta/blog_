<?php

use Phalcon\Mvc\Controller;


class blogController extends Controller
{
    public function indexAction()
    {
        $this->view->post = Posts::find();
        
        
}
   public function blogAction($id) {
    $this->view->post = Posts::findFirstById($id);
    $this->view->title = $title;
    $this->view->content = $content;

   



   }

   public function aboutAction()
   {


}
public function contactAction()
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
    
            

      }
     

}

?>
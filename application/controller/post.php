<?php

if (isset($_SESSION['login_id'])) 
{
    class post extends Controller
    {    	
        public function addPost()
        {           
            if (isset($_POST["submit_add_post"])) {
                if (!empty($_POST["content"])) {  
                    $post_model = $this->loadModel('postmodel');
                    $post_model->addPost($_POST["titel"], $_POST["content"], $_SESSION['login_id']);
                }
            }
            header('location: ' . URL . 'wall/index');
        }
        public function addComment()
        {   
            if (!empty($_POST["content"])) {  
                $post_model = $this->loadModel('postmodel');
                $comment = $post_model->addComment($_POST['id'],$_POST['parent_id'],$_POST["content"], $_SESSION['login_id']);
                echo $comment;
            }
        }
        public function loadmore($lastid)
        {   
            $post_model = $this->loadModel('postmodel');
            $all = $post_model->getPosts($lastid, $_POST['person']);
        
            echo $all;
        }
        public function like()
        {   
            $post_model = $this->loadModel('postmodel');
            $like = $post_model->getLike($_POST['id'],$_SESSION['login_id'],$_POST['post_type'],$_POST['parent_id'],$_POST['type_like']);

            echo $like;
        }
        public function delete()
        {   
            $post_model = $this->loadModel('postmodel');
            $deleted = $post_model->delete($_POST['id'], $_POST['type']);
            return true; 
        }
        
        public function editContent(){
            $post_model = $this->loadModel('postmodel');
            $post_model->editContent($_POST['id'],$_POST['type'],$_POST['content']);
        }
    }
}
else
{
    header("location: " . URL . "home/");
}
<?php
if (isset($_SESSION['login_id']) && $_SESSION['admin'] == 1) 
{
    class admin extends Controller
    {
    	public $activeClass = "admin";

        public function index()
        {
            $profileid = 0;

            $user_model = $this->loadModel('usermodel');

            $info = $user_model->getUserInfo($_SESSION['login_id']);
           
            $admin_model = $this->loadModel('adminmodel');

            $RemovedPosts = $admin_model->GetRemovedPosts();
            $RemovedComments = $admin_model->GetRemovedComments();
            $Users = $admin_model->GetAllUsers();

            require 'application/views/_templates/head.php';
            require 'application/views/_templates/aside.php';
            require 'application/views/_templates/topnav.php';
            require 'application/views/admin/index.php';
            require 'public/js/javascript.php';
        }
        public function changeStatus(){
            $admin_model = $this->loadModel('adminmodel');
            $change = $admin_model->changeStatus($_POST['id'], $_POST['type']);
           
            echo $change;
        }
    }
}
else
{
    header("location: " . URL . "home/");
}
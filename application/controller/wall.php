<?php

if (isset($_SESSION['login_id'])) 
{
    class Wall extends Controller
    {
    	public $activeClass = "wall";
    	
        public function index()
        {
            $user_model = $this->loadModel('usermodel');
            $info = $user_model->getUserInfo($_SESSION['login_id']);

            $profileid = 0;

            require 'application/views/_templates/head.php';
            require 'application/views/_templates/aside.php';
            require 'application/views/_templates/topnav.php';
            require 'application/views/wall/index.php';
            require 'application/views/wall/sidediv.php';
            require 'public/js/javascript.php';
        }          
    }
}
else
{
    header("location: " . URL . "home/");
}
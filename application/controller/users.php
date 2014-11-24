<?php

class Users extends Controller
{	   
    public $activeClass = "users";

    public function index()
    {	       
        $user_model = $this->loadModel('usermodel');
        $info = $user_model->getUserInfo($_SESSION['login_id']);

        $profileid = 0;

    	require 'application/views/_templates/head.php';
        require 'application/views/_templates/aside.php';
        require 'application/views/_templates/topnav.php';
        require 'application/views/users/index.php';
        require 'application/views/users/sidediv.php';
        require 'public/js/javascript.php';
    }
}

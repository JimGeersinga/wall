<?php

class Home extends Controller
{	   
    public function index()
    {	       
    	$this->checkLogin();
        require 'application/views/home/index.php';
    }	
    public function login()
    {	       
       if (isset($_POST["submit_login"])) {           
            $user_model = $this->loadModel('UserModel');
            $error = $user_model->CheckLogin($_POST["email"], $_POST["password"]);
            if($error){
                header("location: " . URL . "home/");
            }else{
                header("location: " . URL . "wall/");
            }
            
        }
    }
    public function register()
    {	       
        require 'application/views/home/register.php';
    }
    public function registered()
    {         
       if (isset($_POST["submit_register"])) {           
            $user_model = $this->loadModel('UserModel');
            $user_model->register($_POST["name"],$_POST["lastname"],$_POST["email"],$_POST["password"],$_POST["dob"],$_POST["mobile"],$_POST["city"]);
        }
    }
    public function logout()
    {          
        session_destroy();
        header("location: " . URL . "home/");
    }
    private function checkLogin()
    {	       
        if (isset($_SESSION['login_id'])) {
        	header("location: " . URL . "wall/");
        }
    }
    public function changemode()
    {   
        if (isset($_POST['on'])) {
            $_SESSION['admin'] = 1;
        }elseif (isset($_POST['off'])) {
            $_SESSION['admin'] = 0;
        }
        header("Location: ".$_SERVER['PHP_SELF']);
    }    
}

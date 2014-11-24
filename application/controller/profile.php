<?php
if (isset($_SESSION['login_id'])) 
{
    class Profile extends Controller
    {
    	public $activeClass = "profile";

        public function index()
        {
            $user_model = $this->loadModel('usermodel');
            $info = $user_model->getUserInfo($_SESSION['login_id']);
            $infoview = $user_model->getUserInfo($_SESSION['login_id']);

            $stats_model = $this->loadModel('statsmodel');
            $stats = $stats_model->getStats($_SESSION['login_id']);

            $profileid = $_SESSION['login_id'];

            require 'application/views/_templates/head.php';
            require 'application/views/_templates/aside.php';
            require 'application/views/_templates/topnav.php';
            require 'application/views/profile/index.php';
            require 'application/views/profile/sidediv.php';
            require 'public/js/javascript.php';
        }
        public function edit()
        {
            $user_model = $this->loadModel('usermodel');
            $info = $user_model->getUserInfo($_SESSION['login_id']);
            
            require 'application/views/_templates/head.php';
            require 'application/views/_templates/aside.php';
            require 'application/views/_templates/topnav.php';
            require 'application/views/profile/index.php';
            require 'application/views/profile/sidediv.php';
            require 'public/js/javascript.php';
        }
        public function view($id)
        {
            $user_model = $this->loadModel('usermodel');
            $info = $user_model->getUserInfo($_SESSION['login_id']);
            $infoview = $user_model->getUserInfo($id);
            
            $stats_model = $this->loadModel('statsmodel');
            $stats = $stats_model->getStats($id);

            $profileid = $id;

            require 'application/views/_templates/head.php';
            require 'application/views/_templates/aside.php';
            require 'application/views/_templates/topnav.php';
            require 'application/views/profile/index.php';
            require 'application/views/profile/sidediv.php';
            require 'public/js/javascript.php';
        }       
        public function update()
        {           
            if (isset($_POST["submit_profile_edit"])) {                
                $user_model = $this->loadModel('usermodel');
                $avatar = $user_model->update($_POST["adres"], $_POST["city"], $_POST["zipcode"], $_POST["tel"], $_POST["mobile"], $_FILES, $_POST["user"]);  
            }
            header('location: ' . URL . 'profile/view/'.$_POST['user']);
           // echo $avatar;
        }
    }
}
else
{
    header("location: " . URL . "home/");
}
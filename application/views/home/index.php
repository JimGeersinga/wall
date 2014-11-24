<!DOCTYPE html>
<html lang="en">
<head>
   <title>The Wall - Login</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/kube.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/login.css">

    <script src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo URL; ?>public/js/kube.min.js"></script>

</head>
<body>
    <style> 
        body{overflow: hidden;} 
    </style>
      
    <nav id="navbar" class="navbar " data-tools="navigation-fixed">
          <span>The Wall</span>
          <ul>
              <li class=""><a href="#login">Login</a></li>
              
          </ul>

    </nav>

    <div class="full-sized login" id="login">
      <div class="loginframe">        
        <div class="centerlogin">
        <div class="loginTitle"> Login</div>
        <div class="loginBody">
          <center><font color="red"><?php if(isset($_SESSION['login_error'])){ echo $_SESSION['login_error']; $_SESSION['login_error']='';} ?></font></center>
           <form method="post" action="<?php echo URL; ?>home/login" class="forms">
              <label>
                  Email
                  <input type="text" name="email" class="width-50" />
              </label>
              <label>
                  Password
                  <input type="password" name="password" class="width-50" />
              </label>
              <p>
                  <button class="btn btn-blue" type="submit" name="submit_login">Log in</button>

              </p>
          </form>
        </div>
        <div class="loginFooter">
          <hr>
           Not registered yet? <a href="<?php echo URL; ?>home/register"> Register here!</a>
           

        </div>
         
         

        </div>
        
      </div>
    </div>

  <script src="<?php echo URL; ?>public/js/jquery.parallax-1.1.3.js"></script>

 
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>The Wall - Login</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/kube.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/login.css">

    <script src="<?php echo URL; ?>public/js/kube.min.js"></script>

</head>
<body>
    
          <style> 
        body{overflow: auto;} 
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
        <div class="loginTitle"> Register</div>
        <div class="loginBody">
           <form method="post" action="<?php echo URL; ?>home/registered" class="forms">
              <label>
                  Name
                  <input type="text" name="name" class="width-50" />
              </label>
               <label>
                  Lastname
                  <input type="text" name="lastname" class="width-50" />
              </label>
              <label>
                  Email
                  <input type="email" name="email" class="width-50" />
              </label>
              <label>
                  Password
                  <input type="password" name="password" class="width-50" />
              </label>
              <label>
                  Date of birth
                  <input type="text" name="dob" class="width-50" />
              </label>
              <label>
                  mobile number
                  <input type="text" name="mobile" class="width-50" />
              </label>
               <label>
                 City
                  <input type="text" name="city" class="width-50" />
              </label>
              <p>
                  <button class="btn btn-blue" type="submit" name="submit_register">Register</button>
              </p>
          </form>
        </div>
        <div class="loginFooter">
          <hr>
          Alreade have an account? <a href="<?php echo URL; ?>home/index"> Login here!</a>
           

        </div>
         
         

        </div>
        
      </div>
    </div>

  
</body>
</html>
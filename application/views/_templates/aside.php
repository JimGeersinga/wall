<body>
   <aside id="primary_sidebar">
     <div class="asideTitle">
       <h1>The Wall</h1>       
     </div>

     <div class="asideProfile">
        <hr class="br">
          <div class="picture">
             <img src="<?php echo URL.'public/img/avatar/'.$info[0]->avatar; ?>" alt="">
          </div>
          <div class="profileName">
            <?php if($_SESSION['admin'] == 1){echo 'Admin '.$info[0]->voornaam;}else{echo $info[0]->voornaam .' '. $info[0]->achternaam;} ?>
          </div>
        <hr class="br">
     </div>

     <nav class="asideMenu">
     
       <ul>
         <a href="<?php echo URL . 'wall/'; ?>">
           <li class="<?php if ($this->activeClass == 'wall') echo 'active'; ?>"><i class="fa fa-newspaper-o fa-fw"></i> <span class="title">Wall</span></li>
         </a>
         <a href="<?php echo URL . 'profile/'; ?>">         
           <li class="<?php if ($this->activeClass == 'profile') echo 'active'; ?>"><i class="fa fa-user fa-fw"></i> <span class="title">Profile</span></li>
         </a>
         <!--
         <a href="<?php echo URL . 'users/'; ?>">
           <li class="<?php if ($this->activeClass == 'users') echo 'active'; ?>"><i class="fa fa-users fa-fw"></i> <span class="title">Users</span></li>
         </a>
         -->
         <?php if ($_SESSION['admin'] == 1) {  ?>              
          <a href="<?php echo URL . 'admin/'; ?>">
           <li class="<?php if ($this->activeClass == 'admin') echo 'active'; ?>"><i class="fa fa-shield fa-fw"></i> <span class="title">Admin panel</span></li>
          </a> 
         <?php } ?>
          <a href="<?php echo URL . 'home/logout'; ?>">         
           <li><i class="fa fa-sign-out fa-fw"></i> <span class="title">Log out</span></li>
         </a>
         <!--
         <a href="#">
          <li><i class="fa fa-users fa-fw"></i> <span class="title">Groups</span></li>
         </a>
        -->
       </ul>
     </nav>
     <div class="asideFooter">
     <hr class="br">
       &copy 2014 The Wall<br> Jim Geersinga
     </div>
   </aside> 

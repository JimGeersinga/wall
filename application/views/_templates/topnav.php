 <nav class="topNav nav-down">
      <div class="menuicon">
        <i class="fa fa-bars"></i>
      </div>     
      <div class="searchbar">
        <form action="" class="forms">
            <div class="input-groups width-100">
                <input type="search" name="q" data-tools="livesearch" data-target="#results" data-url="/livesearch-test.php" placeholder="Search" />
             <span class="btn-append">
                    <button class="btn btn-blue">Search</button>
                </span>
            </div>
        </form>
      </div>       
      <div class="topNavMenu">
        <ul>
         <?php if ($info[0]->admin > 1) {  ?>  
         <li id="dropdown" class="messages">
            <a href="#">
              <i class="fa fa-shield"></i>  <i class="fa fa-caret-down"></i>
            </a>
             <ul id="dropdown-4" class="dropdown">
             <li class="admin">              
                   <center>Turn admin mode on/off:</center>                           
              </li>    
              <li class="admin">              
                 <a href="#" rel="1" class="text-centered">                           
                    <span class="btn-group">
                      <form action="<?php echo URL;?>home/changemode" method="post">
                      <?php if ($_SESSION['admin'] == 1) {  ?>              
                        <button class="btn btn-small btn_admin btn-green btn-active">On</button>
                        <button type="submit" name ="off" class="btn btn-small btn_admin">Off</button>
                      <?php }else if($_SESSION['admin'] == 0){ ?>
                        <button type="submit" name ="on" class="btn btn-small btn_admin">On</button>
                        <button class="btn btn-small btn_admin btn-red btn-active">Off</button>
                      <?php } ?>
                      </form>
                    </span>
                  </a>                              
              </li>            
            </ul>
          </li>
          <?php } ?>
         <!-- <li id="dropdown" class="messages">
            <a href="#">
              <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
             <ul id="dropdown-3" class="dropdown">
              <li>
                <div>
                   <a href="#" rel="1">
                           <i class="fa fa-comment fa-fw"></i> how are you?
                           <span class="pull-right">23 minutes ago</span>
                    </a>
                </div>               
              </li>
              <li class="divider"></li>
              <li>               
                 <div>
                   <a href="#" rel="1">
                           <i class="fa fa-envelope fa-fw"></i> Welcome ( admin )
                           <span class="pull-right text-muted small">1 hour ago</span>
                    </a>
                </div>
              </li>
              <li class="divider"></li>
              <li>              
                   <a href="#" rel="1" class="text-centered">
                           <strong>See all messages</strong>
                           <i class="fa fa-angle-right"></i>
                    </a>                              
              </li>            
            </ul>
          </li>
          <li id="dropdown" class="notifications">
            <a href="#">
              <i class="fa fa-bell fa-fw" ></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul id="dropdown-1" class="dropdown">
              <li>
                  <div>
                       <a href="#" rel="1">
                        <i class="fa fa-bell fa-fw"></i> 1 friend invite(s)
                         <span class="pull-right">5 minutes ago</span>
                      </a>
                  </div>   
              </li>
              <li class="divider"></li>
              <li>
                <div>
                   <a href="#" rel="1">
                           <i class="fa fa-bell fa-fw"></i> New posts on the wall
                           <span class="pull-right text-muted small">40 minutes ago</span>
                    </a>
                </div>                
              </li> 
              <li class="divider"></li>
              <li>              
                   <a href="#" rel="1" class="text-centered">
                           <strong>See all notifications</strong>
                           <i class="fa fa-angle-right"></i>
                    </a>                              
              </li>          
            </ul>
          </li>-->
          <li id="dropdown" class="profile">
            <a href="#">
              <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
             <ul id="dropdown-2" class="dropdown">
              <li>
                  <a href="<?php echo URL . 'profile'; ?>" rel="1">                   
                        <i class="fa fa-user fa-fw"></i>  
                        Profile 
                  </a>
              </li>
             
              <!--<li>
                  <a href="#">
                        <i class="fa fa-gear fa-fw"></i> 
                        Settings
                  </a>
              </li> -->
              <li class="divider"></li>
              <li>
                  <a href="<?php echo URL . 'home/logout'; ?>">
                        <i class="fa fa-sign-out fa-fw"></i> 
                        Logout
                  </a>
              </li>            
            </ul>
          </li> 
        </ul>
      </div>
  </nav> 

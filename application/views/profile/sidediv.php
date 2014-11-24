   <div class="side">
      <div id="profile" class="profile">
        <div class="head">
          <div class="name"><h2><?php echo $infoview[0]->voornaam. ' ' .$infoview[0]->achternaam; ?></h2></div>
          <hr>
          <div class="profileinfo">
            <div class="avatar">
             <img src="<?php echo URL.'public/img/avatar/'.$infoview[0]->avatar; ?>" alt="" width="200px" height="200px">
             
            <?php if ($_SESSION['login_id'] == $infoview[0]->user_id || $_SESSION['admin'] == 1) {
              echo '<button class="btn" id="editprofile">Edit profile</button>';
            }else{
              echo '<button class="btn">'.gmdate("d-m-Y",$infoview[0]->registered).'</button>';
            }
            ?>
            </div>
            <div class="info">
              <table>
                <tr>
                  <td>Adres:</td> <td> <?php echo $infoview[0]->adres; ?></td>  
                </tr>
                <tr>
                  <td>City:</td> <td> <?php echo $infoview[0]->woonplaats; ?></td>  
                </tr>
                <tr>
                  <td>Zip code:</td> <td> <?php echo $infoview[0]->postcode; ?></td>
                </tr>
                <tr>
                  <td>DoB:</td><td> <?php echo $infoview[0]->geboortedatum; ?></td>
                </tr>
                <tr>
                  <td>Tel.:</td><td> <?php echo $infoview[0]->telefoon; ?></td>
                </tr>
                <tr>
                  <td>Mobile:</td><td> <?php echo $infoview[0]->mobiel; ?></td>
                </tr>  
                            
              </table>
            </div>
          </div>
          <hr>
        </div>
         
        <div class="logs">
           <table>
              <tr>
                <td>Posts:</td> <td><?php echo $stats['posts']; ?></td><td>Likes:</td> <td><?php echo $stats['likes']; ?></td> 
              </tr>
              <tr>
                <td>Comments:</td><td><?php echo $stats['comments']; ?></td><td>Dislikes:</td> <td><?php echo $stats['dislikes']; ?></td>
              </tr>
                         
            </table>
        </div>
      </div>
      <div id="profile_edit" class="profile"  style="display:none">
        <div class="head">
          <form enctype="multipart/form-data" action="<?php echo URL; ?>profile/update" method="POST">
            <div class="name"><h2><?php echo $infoview[0]->voornaam. ' ' .$infoview[0]->achternaam; ?></h2></div>
            <hr>
            <div class="profileinfo">
              <div class="avatar">
                <img id="blah" src="<?php echo URL.'public/img/avatar/'.$infoview[0]->avatar; ?>" alt="" width="200px" height="200px">
                 <input type='file' name="bestand" onchange="readURL(this);" />
                 <input type='hidden' name="user" value="<?php echo $infoview[0]->user_id; ?>" />
              </div>
              <div class="info">            
                <table>
                  <tr>
                    <td>Adres:</td> <td><input type="text" name="adres" value="<?php echo $infoview[0]->adres;?>"></td>  
                  </tr>
                  <tr>
                    <td>City:</td> <td><input type="text" name="city" value="<?php echo $infoview[0]->woonplaats;?>"></td>  
                  </tr>
                  <tr>
                    <td>Zip code:</td> <td><input type="text" name="zipcode" value="<?php echo $infoview[0]->postcode;?>"></td>
                  </tr>
                  <tr>
                    <td>DoB:</td><td><input type="text" value="<?php echo $infoview[0]->geboortedatum;?>" disabled></td>
                  </tr>
                  <tr>
                    <td>Tel.:</td><td><input type="text" name="tel" value="<?php echo $infoview[0]->telefoon;?>"></td>
                  </tr>
                  <tr>
                    <td>Mobile:</td><td><input type="text" name="mobile" value="<?php echo $infoview[0]->mobiel;?>"></td>
                  </tr>                              
                </table>
              </div>
            </div>
            <hr>
            <div class="options">
              <button class="btn" id="change">Cancel</button><button class="btn btn-blue" type="submit" name="submit_profile_edit">Save</button>
            </div>
          </form>
        </div> 
      </div>
   </div>
</body>
</html>


   <main id="main_wall">
      <div class="newpost">
        <form method="post" action="<?php echo URL; ?>wall/addpost">
          <div class="hidden"><input type="text" name="titel"></div>
          <div class="textarea">
             <textarea name="content"  rows="2" id="newpost" placeholder="Wat are you doing?"></textarea>            
          </div>      
          <div class="newpostFooter">
            <button class="btn btn-small btn-blue" type="submit" name="submit_add_post">post</button>
          </div>
        </form>
      </div>
    </main> 

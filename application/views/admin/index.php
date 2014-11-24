
<main id="admin_wall">
	<nav class="nav-tabs" data-tools="tabs" data-equals="false">
	    <ul>
	        <li class="tab active"><a href="#tab1" onclick="return false;">Users</a></li>
	        <li class="tab"><a href="#tab2" onclick="return false;">Posts</a></li>               
	        <li class="tab"><a href="#tab3" onclick="return false;">Comments</a></li>               
	    </ul>
	</nav>
	 
	<div id="tab1">
		<table class="table-hovered">
		     <thead>
		        <tr>
		            <th>ID</th>
		            <th>AVATAR</th>
		            <th>EMAIL</th>
		            <th>GROUP</th>
		            <th>USER</th>
		            <th>CITY</th>
		            <th>EDIT</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($Users as $user) { ?>
		        <tr>
		            <td><?php echo $user->userid; ?></td>
		            <td><img src="<?php echo URL; ?>public/img/avatar/<?php echo $user->avatar; ?>"/></td>
		            <td><?php echo $user->email; ?></td>
		            <td><?php echo $user->type; ?></td>
					<td><?php echo '('.$user->id.') <a href="'.URL.'profile/view/'.$user->userid.'">'.$user->voornaam.' '.$user->achternaam; ?><a></td>
					<td><?php echo $user->woonplaats; ?></td>
					<?php if($user->group_id != 2){?>
		            <td><button id="user" onclick="changeStatus(this, <?php echo $user->userid ?>, 1)" class="btn btn-small btn-<?php if($user->status == 1){ echo "red";}else{ echo "green";} ?>" ><?php if($user->status == 1){ echo "unban";}else{ echo "ban";} ?></button></td>
		        	<?php }  ?>
		        </tr>
		    <?php } ?>
		    </tbody>
		</table>
	</div>
	<div id="tab2">
		<table class="table-hovered">
		     <thead>
		        <tr>
		            <th>ID</th>
		            <th>USER</th>
		            <th>TIME</th>
		            <th>CONTENT</th>
		            <th>EDIT</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($RemovedPosts as $post) { ?>
		        <tr>
		            <td><?php echo $post->id; ?></td>
		            <td><?php echo '('.$post->gebruiker_id.') '.$post->voornaam.' '.$post->achternaam; ?></td>
		            <td><?php echo gmdate("d-m-Y H:i:s", $post->datum); ?></td>
		            <td><?php echo mb_substr($post->content, 0, 15) ."... (".str_word_count($post->content)." words)"; ?></td>
		            <td><button id="post" onclick="changeStatus(this, <?php echo $post->id ?>, 2)" class="btn btn-black btn-small">undo</button></td>
		        </tr>
		    <?php } ?>
		    </tbody>
		</table>
	</div>
	<div id="tab3">
		<table class="table-hovered">
		     <thead>
		        <tr>
		            <th>ID</th>
		            <th>P-ID</th>		           
		            <th>PARENT</th>
		            <th>USER</th>
		            <th>TIME</th>
		            <th>CONTENT</th>
		            <th>EDIT</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($RemovedComments as $comment) { ?>
		        <tr>
		            <td><?php echo $comment->id; ?></td>
		            <td><?php echo $comment->post_id; ?></td>
		            <td><?php echo $comment->parent_id; ?></td>
		            <td><?php echo '('.$comment->gebruiker_id.') '.$comment->voornaam.' '.$comment->achternaam; ?></td>
		            <td><?php echo gmdate("d-m-Y H:i:s", $comment->datum); ?></td>
		            <td><?php echo mb_substr($comment->content, 0, 15) ."... (".str_word_count($comment->content)." words)"; ?></td>
		            <td><button id="comment" onclick="changeStatus(this, <?php echo $comment->id ?>, 3)" class="btn btn-black btn-small">undo</button></td>
		        </tr>
		    <?php } ?>
		    </tbody>
		</table>
	</div>
    
</main> 
<script>
$('li.tab').click(function(){
	$('html,body').scrollTop(0);
});	
function changeStatus(element, id, type){
 	$.feyenoord({     
      	url:"<?php echo URL; ?>admin/changeStatus/",
	    type : 'POST',
	    data : {id : id, type : type},
	    dataType : 'json',
        success: function(result){     
	        if(type == 1){
	        	if(result.status == 1){
	        		$(element).removeClass('btn-green').addClass('btn-red').text('unban'); 
	        	}else{
	        		$(element).removeClass('btn-red').addClass('btn-green').text('ban');
	        	} 
	        }else{
	        	$(element).removeClass('btn-black').addClass('btn-green').text('done');
	        }
	    }
    });
}
</script>
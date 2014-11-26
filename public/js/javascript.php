<script>
    setWidth(); 
    getPost();

    var loading = false;
    var open = 0;

    var definition = {  "smile":{"title":"Smile","codes":[":)",":=)",":-)"]},
                        "sad-smile":{"title":"Sad Smile","codes":[":(",":=(",":-("]},
                        "big-smile":{"title":"Big Smile","codes":[":D",":=D",":-D",":d",":=d",":-d"]},
                        "cool":{"title":"Cool","codes":["8)","8=)","8-)","B)","B=)","B-)","(cool)"]},
                        "wink":{"title":"Wink","codes":[":o",":=o",":-o",":O",":=O",":-O"]},
                        "crying":{"title":"Crying","codes":[";(",";-(",";=("]},
                        "sweating":{"title":"Sweating","codes":["(sweat)","(:|"]},
                        "speechless":{"title":"Speechless","codes":[":|",":=|",":-|"]},
                        "kiss":{"title":"Kiss","codes":[":*",":=*",":-*"]},
                        "tongue-out":{"title":"Tongue Out","codes":[":P",":=P",":-P",":p",":=p",":-p"]},
                        "blush":{"title":"Blush","codes":["(blush)",":$",":-$",":=$",":\">"]},
                        "wondering":{"title":"Wondering","codes":[":^)"]},
                        "heart":{"title":"heart","codes":["<3"]},
                        "party":{"heart":"party","codes":["<:o)"]}
                      };
    $.emoticons.define(definition);

    $(window).resize(function(event){ setWidth(); });
    $(window).scroll(function(event){ getPost(); });

    $('.topNavMenu #dropdown').click(function() {
      $(this).addClass('display');
      $(this).css('background-color', '#D8D8D8');
    });
    $('#editprofile').click(function(){
      $('#profile').css('display','none');
      $('#profile_edit').css('display','block');
    });
    $('#change').click(function(){
      $('#profile_edit').css('display','none');
      $('#profile').css('display','block');      
    });

    $(document).mouseup(function (e){
      container = $('.topNavMenu .display');
      container2 = $('.replycomment');
      if (!container.is(e.target) && container.has(e.target).length === 0){
        container.css('background-color', 'rgba(0,0,0,0)');
        container.removeClass('display');
      }      
      if (!container2.is(e.target) && container2.has(e.target).length === 0){
        container2.css('display', 'none');
      }
    });
    $(window).keydown(function(event){
      if((event.keyCode == 107 && event.ctrlKey == true) || (event.keyCode == 109 && event.ctrlKey == true)){
        event.preventDefault();
      }
      $(window).bind('mousewheel DOMMouseScroll', function(event){
        if(event.ctrlKey == true){
          event.preventDefault();
        }
      });
    });
    function setWidth(){
      width =  $(window).width();
      if($(window).width() < 950){ widthnav = width - 50; }
      else{ widthnav = width - 220; }
     
      if($(window).width() < 950){ widthwall = width - 70; }
      else if($(window).width() > 950 && $(window).width() < 1165){ widthwall = width - 260; }
      else{ widthwall = width - 710; }

      $('#main_wall').css('width',widthwall);
      $('.topNav').css('width',widthnav);
    }
    function getPost(){

      if($(window).scrollTop() + $(window).height() > $(document).height()-51) {
    
        loading = true;  
        if (typeof lastpost === 'undefined') { lastpost = 9999999999;}
    
        $.feyenoord({     
          url:"<?php echo URL; ?>post/loadmore/"+lastpost,
          type : 'POST',
          data: {person : <?php echo $profileid; ?>},
          dataType : 'json',
            success: function(result){              
              var posts = '';
                  for (var i = 0; i < result.length; i++) {
                    posts += postHTML(result[i]);
                  }
                  if($("div.wall").length){
                    $(posts).insertAfter($('.wall').last());
                  }else{
                    $(posts).insertAfter('.newpost');
                  }
              loading = false;            
            }
        });
      }
    }
    function getComments(comments, level, result){  
    if(comments == null) return; 
      for (var i = 0; i < comments.length; i++) {
        getComment(comments[i], level, result);       
      }
    }
    function getComment(comment, level, result){
      result.content +=commentHTML(comment, level);
      if(comment.comments != false){
        getComments(comment.comments, level+1, result);
      }
    }
    function postHTML(result){
      if (result.like_type == 'dislike') {
        var dislike = 'fa-thumbs-down';
      }else{
        var dislike = 'fa-thumbs-o-down';
      }
      if (result.like_type == 'like') {
        var like = 'fa-thumbs-up';
      }else{
        var like = 'fa-thumbs-o-up';
      }
      if (result.person_id == <?php echo $_SESSION['login_id']; ?> || <?php echo $_SESSION['admin'];  ?> == 1) {
        var  deletepost = '<i class="fa editpost fa-fw  fa-pencil-square-o" onclick="editcontent('+result.id+', \'post\','+result.person_id+')"></i><i class="fa deletepost fa-fw fa-times" onclick="deletepost('+result.id+',\'post\',0)"></i>';                      
      }else{
        var  deletepost = '';
      }
      
      lastpost = result.id;             
      var view = { content : '' };
      getComments(result.comments,0,view);    
      return '<div class="wall post'+result.id+'" id="'+result.id+'"> \
                  '+deletepost+' \
                  <div class="wallTitle"> \
                    <div class="wallProfile"> \
                      <img src="<?php echo URL; ?>public/img/avatar/'+result.avatar+'" alt=""> \
                    </div> \
                    <div class="wallTitleContent"> \
                      <a href="<?php echo URL; ?>profile/view/'+result.person_id+'">'+result.voornaam+' '+result.achternaam+'</a> <br> \
                      <span class="time" data-theme="blue" data-tools="tooltip" title="'+result.datum+'">'+result.timepassed+'</span> \
                    </div> \
                      <div class="title"> \
                        <div class="titelcontent"> \
                      </div> \
                    </div> \
                  </div> \
                  <div class="wallContent" > \
                     <span class="contentpost'+result.id+' emoticons"> '+$.emoticons.replace(result.content)+'</span> \
                  </div> \
                  <div class="wallContentBar"> \
                    <div class="wallframe"> \
                      <ul> \
                        <li class="like"><i class="fa fa-fw '+like+'" title="like" onclick="like(this,'+result.id+', \'post\', 0, \'like\')"></i><span>'+result.likes+'</span></li> \
                        <li class="dislike"><i class="fa fa-fw '+dislike+'" title="dislike" onclick="like(this,'+result.id+', \'post\', 0, \'dislike\')"></i><span>-'+result.dislikes+'</span></li> \
                        <li class="reply"><i class="fa fa-reply" onclick="showCommentInput('+result.id+', \'posttype\')" title="reply"></i></li> \
                      </ul> \
                    </div> \
                  </div> \
                  <div class="wallFooter footer'+result.id+'"> \
                      <div class="textarea posttype'+result.id+' replycomment" id="'+result.id+'" > \
                        <textarea rows="1" onkeyup="addComment(this,'+result.id+',0)" placeholder="Type a comment..."></textarea> \
                      </div> \
                       '+view.content+' \
                  </div> \
                </div>';                   
    }
    function commentHTML(comment, level){
      if (comment.like_type == 'dislike') {
        var dislike = 'fa-thumbs-down';
      }else{
        var dislike = 'fa-thumbs-o-down';
      }
      if (comment.like_type == 'like') {
        var like = 'fa-thumbs-up';
      }else{
        var like = 'fa-thumbs-o-up';
      }
      if (level+1 < <?php echo MAX_COMMENTS; ?> ){
        reply = '<li class="reply"><i class="fa fa-reply"  onclick="showCommentInput('+comment.id+', \'commenttype\')"  title="reply"></i></li>' ;
      }else{
        reply = '';
      }
      if (comment.person_id == <?php echo $_SESSION['login_id']; ?> || <?php echo $_SESSION['admin'];  ?> == 1) {
        var  deletepost = '<i class="fa deletepost2 fa-fw fa-times" title="delete post" onclick="deletepost('+comment.id+',\'comments\')"></i>';                      
        var  editpost = '<i class="fa editpost2 fa-fw  fa-pencil-square-o"  onclick="editcontent('+comment.id+', \'comments\')"></i>';                      
      }else{
        var  deletepost = '';
        var  editpost = '';
      }
      return  ' <div class="comments comment'+comment.id+' comments'+comment.parent_id+'" id="'+comment.id+'" style="padding-left: '+(level*40).toString()+'px"> <div class="comment"> \
                  <div class="comment_img"><img src="<?php echo URL; ?>public/img/avatar/'+comment.avatar+'"/></div> \
                    <div class="comment_content"> \
                      <a href="<?php echo URL; ?>profile/view/'+comment.person_id+'">'+comment.voornaam+' '+comment.achternaam+'</a> \
                      <span class="contentcomments'+comment.id+'"> '+$.emoticons.replace(comment.content)+'</span> \
                      <div class="comment_bar"> \
                        <ul> \
                            <li>'+comment.timepassed+'</li> \
                            <li class="like"><i class="fa fa-fw '+like+'" title="like" onclick="like(this,'+comment.post_id+',\'subpost\','+comment.id+', \'like\')"></i><span>'+comment.likes+'</span></li> \
                            <li class="dislike"><i class="fa fa-fw '+dislike+'" title="dislike" onclick="like(this,'+comment.post_id+',\'subpost\','+comment.id+', \'dislike\')"></i><span>-'+comment.dislikes+'</span></li> \
                            <li>'+editpost+'</li> \
                            <li>'+deletepost+'</li> \
                             '+reply+'\
                        </ul> \
                      </div> \
                      <div class="textarea comment commenttype'+comment.id+' replycomment" id="comment"> \
                        <textarea rows="1" onkeydown="addComment(this, '+comment.post_id+','+comment.id+')" placeholder="Type a comment..."></textarea> \
                      </div> \
                    </div> \
                  </div> \
                </div>';
    }
  

function showCommentInput(element, type){
  $('div.'+type+element).css('display', 'block');
}
function like(element,postid,post,parent,type){
  $.feyenoord({     
    url: "<?php echo URL; ?>post/like/",
    type : 'POST',
    data : {id: postid, post_type : ''+post+'', parent_id : parent, type_like : ''+type+''},
    dataType : 'json',
    success: function(result){  
      dl = $("li.dislike");
      if(type == 'like'){
        $(element).parent().find('span').text(result.likes);
        $(element).parent().parent().find("li.dislike").find('span').text('-'+result.dislikes);        
      }
      else if(type == 'dislike'){
        $(element).parent().find('span').text('-'+result.dislikes);
        $(element).parent().parent().find("li.like").find('span').text(result.likes);       
      }
      if(type == 'like' && result.actiontaken == 'inserted'){
          $(element).addClass('fa-thumbs-up').removeClass('fa-thumbs-o-up');
      } else if(type == 'like' && result.actiontaken == 'deleted'){
          $(element).addClass('fa-thumbs-o-up').removeClass('fa-thumbs-up');
      } else if(type == 'dislike' && result.actiontaken == 'inserted'){
          $(element).addClass('fa-thumbs-down').removeClass('fa-thumbs-o-down');
      } else if(type == 'dislike' && result.actiontaken == 'deleted'){
          $(element).addClass('fa-thumbs-o-down').removeClass('fa-thumbs-down');
      }else if(type == 'like' && result.actiontaken == 'changed'){
          $(element).addClass('fa-thumbs-up').removeClass('fa-thumbs-o-up');         
          $(element).parent().parent().find("li.dislike").find('i').addClass('fa-thumbs-o-down').removeClass('fa-thumbs-down');   
      }else if(type == 'dislike' && result.actiontaken == 'changed'){
          $(element).addClass('fa-thumbs-down').removeClass('fa-thumbs-o-down');
          $(element).parent().parent().find("li.like").find('i').addClass('fa-thumbs-o-up').removeClass('fa-thumbs-up');    
      }
    }
  });
}  
function addComment(element,postid,parent){
    value = $(element).val();
    if (event.keyCode == 13) {
      $(element).val('');
      $(element).parent().css('display','none');

      $.feyenoord({
        url:"<?php echo URL; ?>post/addcomment/",
        type : 'POST',
        data : {id: postid, parent_id : parent, content : value},
        dataType : 'json',
        success: function(comment){  
          if(comment.parent_id == 0){
            if ($('.footer'+comment.post_id).find('.comments').length) {
              $(commentHTML(comment, 0)).insertAfter($('.footer'+comment.post_id).find('.comments').last());
            }else{
              $('.footer'+comment.post_id).append(commentHTML(comment, 0));
            }
          }else{
            if ($('.footer'+comment.post_id).find('.comments'+comment.parent_id).length) {
              $(commentHTML(comment, 1)).insertAfter($('.footer'+comment.post_id).find('.comments'+comment.parent_id).last());
            }else{
              $(commentHTML(comment, 1)).insertAfter($('.footer'+comment.post_id).find('#'+comment.parent_id));
            }
             
          }
        }
      });
    }
  }
  function editcontent(id,type){
    if(open == 1){
      $('#close').click();
    }
      
      content =  $('.content'+type+id).text();
      var buttons = '<div class="editbuttons"><button class="btn btn-small width-50" id="close" onclick="canceledit(this,'+id+',\''+type+'\', content)">Cancel</button><button class="btn btn-small btn-blue width-50" onclick="saveContent(this,'+id+',\''+type+'\')" >Save</button></div>';

      $('.content'+type+id).replaceWith("<textarea rows='1' class='text"+type+id+" openedtextarea'>"+content+"</textarea>");
      $('textarea').textareaAutoSize();
      $(buttons).insertAfter('.text'+type+id);
      open = 1;
  }
  function canceledit(element,id,type, content){
    $(element).parent().parent().find(".text"+type+id).replaceWith("<span class='content"+type+id+"'>"+$.emoticons.replace(content)+"</span>");
    $(element).parent().remove();
    open = 0;
  }
  function saveContent(element,id,type,user){
    var type = ''+type+'';
    var content = $(".text"+type+id).val();
    $(element).parent().parent().find(".text"+type+id).replaceWith("<span class='content"+type+id+"'>"+$.emoticons.replace(content)+"</span>");
 
    $('#close').parent().remove();
    $.feyenoord({
      url:"<?php echo URL; ?>post/editContent",
      type : 'POST',
      data: {id: id, type: type, content : content, user : user}
    });
  }
  function deletepost(id,type){
    var type = ''+type+'';
    $.feyenoord({
      url:"<?php echo URL; ?>post/delete",
      type : 'POST',
      data: {id: id, type: type},
      success: function(result){   
        if (type == 'post') {
          $('.post'+id).fadeOut();
        }else{
          $('.comment'+id).fadeOut();
          $('.comments'+id).fadeOut();
        }        
      }
    });
  }
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#blah')
          .attr('src', e.target.result)
          .width(200);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
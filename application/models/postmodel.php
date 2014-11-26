<?php

class PostModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function addPost($titel,$content,$user_id)
    {
        if($this->IsAllowedToPost() == true){
            $titel = strip_tags($titel);
            $content = strip_tags($content);
            $user_id = strip_tags($user_id);

            if(!empty($content)){
                $sql = "INSERT INTO post (titel, content, gebruiker_id ,datum) VALUES (:titel, :content, :user_id, ".time().")";
                $query = $this->db->prepare($sql);
                $query->execute(array(':titel' => $titel, ':content' => $content, ':user_id' => $user_id));
            }
        }
    }
    public function addComment($post_id,$parent_id,$content,$user_id)
    {
        if($this->IsAllowedToPost() == true){
            $post_id = strip_tags($post_id);
            $parent_id = strip_tags($parent_id);
            $content = strip_tags($content);
            $user_id = strip_tags($user_id);

            if(!empty($content)){
                $sql = "INSERT INTO comments (post_id, parent_id, content, gebruiker_id ,datum) VALUES (:post_id, :parent_id, :content, :user_id, ".time().")";
                $query = $this->db->prepare($sql);
                $query->execute(array(':post_id' => $post_id,':parent_id' => $parent_id, ':content' => $content, ':user_id' => $user_id));
                
                $id = $this->db->lastInsertId();
                $sql = "SELECT comments.id, comments.post_id, avatar, comments.status, comments.content, comments.parent_id, comments.datum,gebruiker.id as person_id, persoon.voornaam, persoon.achternaam
                        FROM comments
                        INNER JOIN gebruiker ON comments.gebruiker_id = gebruiker.id
                        INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                        WHERE comments.id = ".$id;
                $query = $this->db->prepare($sql);
                $query->execute();
                $comments = $query->fetchAll();
                foreach($comments as $comment){ 
                    $arr['id'] = $comment->id;
                    $arr['post_id'] = $comment->post_id;
                    $arr['avatar'] = $comment->avatar;
                    $arr['person_id'] = $comment->person_id;
                    $arr['voornaam'] = $comment->voornaam;
                    $arr['achternaam'] = $comment->achternaam;
                    $arr['content'] = nl2br(trim($comment->content));
                    $arr['timepassed'] = getAge($comment->datum);
                    $arr['datum'] = gmdate("d-m-Y H:i:s", $comment->datum);
                    $arr['parent_id'] = $comment->parent_id;
                    $arr['likes'] = $this->countLikes($comment->post_id, 'like', 'subpost',$comment->id);
                    $arr['dislikes'] = $this->countLikes($comment->post_id, 'dislike', 'subpost',$comment->id);
                    $arr['like_type'] = $this->getLikeType($comment->post_id,$_SESSION['login_id'],'subpost',$comment->id);
                }
                return json_encode($arr);
            }
        }
    }
    public function getPosts($lastid, $person)
    {       
        if ($person > 0) {
            $sql = "SELECT post.id, avatar, titel, content, datum , post.status, gebruiker.id as person_id, persoon.voornaam, persoon.achternaam 
                    FROM post 
                    INNER JOIN gebruiker ON post.gebruiker_id = gebruiker.id
                    INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                    WHERE post.id < ".$lastid."  AND post.status = 0 AND gebruiker_id = ".$person." AND gebruiker.status = 0
                    ORDER BY id DESC LIMIT 5";
        }else{
            $sql = "SELECT post.id, avatar, titel, content, datum , post.status, gebruiker.id as person_id, persoon.voornaam, persoon.achternaam 
                    FROM post 
                    INNER JOIN gebruiker ON post.gebruiker_id = gebruiker.id
                    INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                    WHERE post.id < ".$lastid."  AND post.status = 0  AND gebruiker.status = 0
                    ORDER BY id DESC LIMIT 5";
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        $posts = $query->fetchAll();   
        $i = 0;    

        foreach($posts as $post){        
            $arr[$i]['id'] =  $post->id;
            $arr[$i]['avatar'] =  $post->avatar;
            $arr[$i]['person_id'] = $post->person_id;
            $arr[$i]['voornaam'] = $post->voornaam;
            $arr[$i]['achternaam'] = $post->achternaam;
            $arr[$i]['timepassed'] = getAge($post->datum);
            $arr[$i]['datum'] = gmdate("d-m-Y H:i:s", $post->datum);
            $arr[$i]['content'] = nl2br(trim($post->content));
            $arr[$i]['likes'] = $this->countLikes($post->id, 'like', 'post',0);
            $arr[$i]['dislikes'] = $this->countLikes($post->id, 'dislike', 'post',0);
            $arr[$i]['like_type'] = $this->getLikeType($post->id,$_SESSION['login_id'],'post',0);
            $arr[$i]['comments'] = $this->getComments($post->id, 0, 0, MAX_COMMENTS);
            $i++;
        }
        return json_encode($arr);
    }
    public function getComments($id, $parent_id, $count, $count_max){
        $count++;
        if ($count <= $count_max) {
            $sql = "SELECT comments.id, post.id as postid, comments.parent_id, avatar, comments.status, comments.content, comments.parent_id, comments.datum, gebruiker.id as person_id, persoon.voornaam, persoon.achternaam
                    FROM comments
                    INNER JOIN gebruiker ON comments.gebruiker_id = gebruiker.id
                    INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                    INNER JOIN post ON comments.post_id = post.id
                    WHERE post_id = ". $id ." AND comments.status = 0 AND comments.parent_id = ".$parent_id." ORDER BY id ASC";
            $query = $this->db->prepare($sql);
            $query->execute();
            $comments = $query->fetchAll();
            if ($comments) {
                $i = 0;
                foreach($comments as $comment){ 
                    $arr[$i]['id'] = $comment->id;
                    $arr[$i]['post_id'] = $comment->postid;
                    $arr[$i]['avatar'] = $comment->avatar;
                    $arr[$i]['person_id'] = $comment->person_id;
                    $arr[$i]['voornaam'] = $comment->voornaam;
                    $arr[$i]['achternaam'] = $comment->achternaam;
                    $arr[$i]['content'] = nl2br(trim($comment->content));
                    $arr[$i]['timepassed'] = getAge($comment->datum);
                    $arr[$i]['datum'] = gmdate("d-m-Y H:i:s", $comment->datum);
                    $arr[$i]['parent_id'] = $comment->parent_id;
                    $arr[$i]['likes'] = $this->countLikes($id, 'like', 'subpost',$comment->id);
                    $arr[$i]['dislikes'] = $this->countLikes($id, 'dislike', 'subpost',$comment->id);
                    $arr[$i]['like_type'] = $this->getLikeType($id,$_SESSION['login_id'],'subpost',$comment->id);
                    $arr[$i]['comments'] = $this->getComments($id, $comment->id, $count, $count_max);
                    
                    $i++;               
                }
                return $arr;
            }else{
                return null;
            }
        }
    }
    public function editContent($id,$type,$content){
        if(CheckOwn($type,$id) || $_SESSION['admin'] == 1){
            $sql = "UPDATE ".$type." SET content = '".$content."' WHERE id = ".$id;
            $query = $this->db->prepare($sql);
            $query->execute();
        }
    }
    public function delete($id,$type){
        if(CheckOwn($type,$id) || $_SESSION['admin'] == 1){
            $sql = "UPDATE ".$type." SET status = 1 WHERE id = ".$id;
            $query = $this->db->prepare($sql);
            $query->execute();
            if ($type == 'comments') {
                $sql = "UPDATE ".$type." SET status = 1 WHERE parent_id = ".$id;
                $query = $this->db->prepare($sql);
                $query->execute();
            }
        }
    }
    public function getLike($post_id,$user_id,$post_type,$parent_id,$type_like){
        $sql = "SELECT like_type FROM likes WHERE post_id = ".$post_id." AND post_type =  '".$post_type."' AND gebruiker_id =  ".$user_id." AND parent_id = ". $parent_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $like = $query->fetch(PDO::FETCH_OBJ);      
         
        if ($like) {
            if ($like->like_type != $type_like) {
                $sql = "UPDATE likes SET like_type = '".$type_like."' WHERE post_id = ".$post_id." AND post_type = '".$post_type."' AND gebruiker_id =  ".$user_id." AND parent_id = ". $parent_id;
                $query = $this->db->prepare($sql);
                $query->execute();
                
                $return['actiontaken'] = "changed";
                $return['likes'] = $this->countLikes($post_id, 'like', $post_type, $parent_id);
                $return['dislikes'] = $this->countLikes($post_id, 'dislike', $post_type, $parent_id);
                return json_encode($return);
            }
            else if ($like->like_type == $type_like) {
                $sql = "DELETE FROM likes WHERE post_id = ".$post_id." AND post_type = '".$post_type."' AND gebruiker_id =  ".$user_id." AND parent_id = ". $parent_id;
                $query = $this->db->prepare($sql);
                $query->execute();

                $return['actiontaken'] = "deleted";
                $return['likes'] = $this->countLikes($post_id, 'like', $post_type, $parent_id);
                $return['dislikes'] = $this->countLikes($post_id, 'dislike', $post_type, $parent_id);
                return json_encode($return);
            }
        }else{
            $sql = "INSERT INTO likes (gebruiker_id, post_id, like_type, datum, parent_id, post_type) VALUES (".$user_id.", ".$post_id.", '".$type_like."', ".time()." ,". $parent_id.", '".$post_type."')";
            $query = $this->db->prepare($sql);
            $query->execute();
            
            $return['actiontaken'] = "inserted";
            $return['likes'] = $this->countLikes($post_id, 'like', $post_type, $parent_id);
            $return['dislikes'] = $this->countLikes($post_id, 'dislike', $post_type, $parent_id);
            return json_encode($return);
        }
       
    }
     public function countLikes($post_id,$type_like,$post_type,$parent_id){
        $sql = "SELECT count(like_type) as alllikes FROM likes WHERE post_id = ".$post_id." AND post_type = '".$post_type."' AND parent_id = ". $parent_id ." AND like_type = '".$type_like."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $like = $query->fetch(PDO::FETCH_OBJ);
            if ($like) {               
                return $like->alllikes;
            }else{
                return null;
            }     
    }   
    public function getLikeType($post_id,$user_id,$post_type,$parent_id){
        $sql = "SELECT like_type FROM likes WHERE post_id = ".$post_id." AND post_type =  '".$post_type."' AND gebruiker_id =  ".$user_id." AND parent_id = ". $parent_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $like = $query->fetch(PDO::FETCH_OBJ); 
        if ($like) {
            $return = $like->like_type;
        }else{
            $return = 'none';
        }     
        
        return $return;
    }
    private function IsAllowedToPost()
    {   
        $sql = "SELECT status FROM gebruiker WHERE id = ".$_SESSION['login_id']; 
        $query = $this->db->prepare($sql); 
        $query-> execute();
        $status = $query->fetch(PDO::FETCH_OBJ);        
        if ($status->status == 0) {
             return true;  
        }else{
            header("location: " . URL . "home/logout");
        }        
    }
    private function CheckOwn($table,$id){
        $sql = "SELECT * FROM $table WHERE id = ".$id; 
        $query = $this->db->prepare($sql); 
        $query-> execute();
        if($query->rowCount() > 0){          
            $error = false;         
        } else {           
            $error = true;   
        }
        return $error;
    }   
}

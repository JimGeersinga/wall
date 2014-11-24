<?php

class StatsModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function getStats($id){
        $sql = "SELECT count(*) as posts FROM post WHERE status = 0 AND  gebruiker_id = ".$id; 
        $query = $this->db->prepare($sql);              
        $query->execute();
        $posts = $query->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT count(*) as comments FROM comments WHERE status = 0 AND  gebruiker_id = ".$id; 
        $query = $this->db->prepare($sql);              
        $query->execute();
        $comments = $query->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT count(*) as likes FROM likes WHERE like_type = 'like' AND  gebruiker_id = ".$id; 
        $query = $this->db->prepare($sql);              
        $query->execute();
        $likes = $query->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT count(*) as dislikes FROM likes WHERE like_type = 'dislike' AND  gebruiker_id = ".$id; 
        $query = $this->db->prepare($sql);              
        $query->execute();
        $dislikes = $query->fetch(PDO::FETCH_OBJ);
       
        $arr['posts'] = $posts->posts;
        $arr['comments'] = $comments->comments;
        $arr['likes'] = $likes->likes;
        $arr['dislikes'] = $dislikes->dislikes;

        return $arr;
    }
}

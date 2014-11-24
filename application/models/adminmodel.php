<?php

class AdminModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function GetRemovedPosts()
    {
        $sql = "SELECT post.*, persoon.voornaam, persoon.achternaam 
                FROM post 
                INNER JOIN gebruiker ON post.gebruiker_id = gebruiker.id
                INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                WHERE post.status = 1 ORDER BY post.id desc
               ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
     public function GetRemovedComments()
    {
        $sql = "SELECT comments.*, persoon.voornaam, persoon.achternaam 
                FROM comments 
                INNER JOIN gebruiker ON comments.gebruiker_id = gebruiker.id
                INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                WHERE comments.status = 1 ORDER BY comments.id desc
               ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function GetAllUsers()
    {
        $sql = "SELECT persoon.*, gebruiker.id as userid, gebruiker.email, gebruiker.avatar, gebruiker.registered, gebruiker.status, groep.type, groep.id as group_id
                FROM gebruiker                
                INNER JOIN persoon ON gebruiker.persoon_id = persoon.id
                INNER JOIN groep ON gebruiker.groep_id = groep.id
               ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function changeStatus($id, $type){
        if($type == 1){
            $table = 'gebruiker';
        }else if($type == 2){
            $table = 'post';
        }else if($type == 3){
            $table = 'comments';
        }

        $sql = "SELECT status FROM ".$table." WHERE id = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $status = $query->fetch(PDO::FETCH_OBJ);

        if($status->status == 1){
            $status = 0;
        }else if($status->status == 0 && $type == 1){
            $status = 1;
        }

        $sql = "UPDATE ".$table." SET status = ".$status." WHERE id = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();

        $arr['status'] = $status;
        return json_encode($arr);
    }
}

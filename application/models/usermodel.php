<?php

class UserModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function CheckLogin($email, $password)
    {      
        $email = strip_tags($email);
        $password = strip_tags($password);
        $sql = "SELECT id,email, password FROM gebruiker WHERE email = :email AND password = :password"; 

        $query = $this->db->prepare($sql);              
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $id = $query-> fetch(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            $_SESSION['login_id'] = $id->id;  
            $error = false;         
        }
        else
        {
            $_SESSION['login_error'] = 'Email or password incorrect!';
            $error = true;   
        }
        return $error;
    }
    public function getUserInfo($id){
        $sql = "SELECT *, gebruiker.id as user_id, groep.id as admin
                FROM gebruiker 
                LEFT JOIN persoon on gebruiker.persoon_id = persoon.id 
                LEFT JOIN groep on gebruiker.groep_id = groep.id 
                WHERE gebruiker.id = ".$id; 

        $query = $this->db->prepare($sql);              
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();
        $_SESSION['group'] = $result[0]->admin;
        if ($result) {
           return $result;
        }else{
             header("location: " . URL . "profile/");
        }
    }
    public function register($name, $lastname, $email, $password, $dob, $mobile, $city){
        $sql = "INSERT INTO persoon (voornaam,achternaam,geboortedatum,mobiel,woonplaats, adres, postcode,telefoon) 
                VALUES (:name, :lastname, :dob, :mobile, :city, '-','-','-')"; 
        $query = $this->db->prepare($sql);     
        $query-> bindParam(':name', $name, PDO::PARAM_STR);
        $query-> bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query-> bindParam(':dob', $dob, PDO::PARAM_STR);
        $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);         
        $query-> bindParam(':city', $city, PDO::PARAM_STR);         
        $query->execute();

        $lastid = $this->db->lastInsertId();

        $sql = "INSERT INTO gebruiker (email, password, groep_id, persoon_id, status, avatar, registered) 
                VALUES (:email, :password, 1, ".$lastid.", 0, 'noprofile.jpg', ".time().")"; 
        $query = $this->db->prepare($sql);   
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);                   
        $query->execute();

         header("location: " . URL . "wall/");
    }
    public function update($adres, $city, $zipcode, $tel, $mobile, $avatar, $user){
        $sql = "SELECT persoon.id as person_id FROM gebruiker JOIN persoon ON persoon.id = gebruiker.persoon_id WHERE gebruiker.id = ".$user; 
        $query = $this->db->prepare($sql);                         
        $query-> execute();   
        $person_id = $query-> fetch(PDO::FETCH_OBJ); 

        $sql = "UPDATE persoon SET adres = :adres, woonplaats = :city, postcode = :zipcode, telefoon = :tel, mobiel = :mobile WHERE persoon.id = ".$person_id->person_id; 
        $query = $this->db->prepare($sql);
        $query-> bindParam(':adres', $adres, PDO::PARAM_STR);
        $query-> bindParam(':city', $city, PDO::PARAM_STR);
        $query-> bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
        $query-> bindParam(':tel', $tel, PDO::PARAM_STR);
        $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);                   
        $query->execute();

        $target_dir = "public/img/avatar/";
        $temp = explode(".",$avatar["bestand"]["name"]);
        $newfilename = rand(1,99999999999999999) . '.' .end($temp);
        $target_file = $target_dir . $newfilename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
       
        // Check if file already exists
        if (file_exists($target_file)) {
           // return "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($avatar["bestand"]["size"] > 3000000) {
            //return "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
           // return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //return "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($avatar["bestand"]["tmp_name"], $target_file)) {
                $sql = "UPDATE gebruiker SET avatar = '".$newfilename."' WHERE id = ".$user; 
                $query = $this->db->prepare($sql);              
                $query->execute();
              //  return "The file ".$newfilename. " has been uploaded.";
            } else {
               // return "Sorry, there was an error uploading your file.";
            }
        }
        $sql = "UPDATE persoon SET adres = '".$adres."', woonplaats = '".$city."', postcode = '".$zipcode."', telefoon = '".$tel."', mobiel = '".$mobile."' WHERE persoon.id = ".$person_id->person_id; 
        $query = $this->db->prepare($sql);              
        $query->execute();
    }
}

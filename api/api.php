<?php
function create(){
        $sql = file_get_contents("../sql/table.sql");
        $sql1 = file_get_contents("../sql/data.sql");
        try {
            $dbh = connect();
            $dbh->exec($sql);
            $dbh->exec($sql1);
        } catch (PDOException $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
        }
    }

    function connect(){
        $dbh = new PDO('sqlite:triplea.sqlite');
        return $dbh;
    }

    function sqlDbRequest($req){
        $dbh = connect();
        $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $sql = $req;
        $dbh->beginTransaction();
        try {
            $sth = $dbh->prepare($sql);
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $dbh->commit();
            return $data;
        } catch(PDOException $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
            $dbh->rollback();
        }
    }

    function getAllTopics(){
        $data = sqlDbRequest("SELECT * FROM topic");
        return $data;
    }   

    function getTopicById($id){
        $data = sqlDbRequest("SELECT * FROM topic WHERE id=$id");
        return $data;
    }  

    function getUserById($id){
        $data = sqlDbRequest("SELECT id , nickname , nom , prenom , email , date_inscription , avatar_url FROM user WHERE id=$id");
        return $data;
    }
    function getUserByMail($mail){
        $data = sqlDbRequest("SELECT id , nickname , nom , prenom , email , date_inscription , avatar_url FROM user WHERE email=$mail");
        return $data;
    }  

    function getCommentByTopic($topicId){
        $data = sqlDbRequest("SELECT * FROM post WHERE fk_topic=$topicId");
        return $data;
    }
    function connectForum($email,$password){
        $data = sqlDbRequest("SELECT COUNT(*) FROM user WHERE email=$email AND password=$password");
        return $data;
    }
    function newTopic($titre,$content,$date,$categorie,$user){
        $data = sqlDbRequest("INSERT INTO `topic` (titre, message, date_creation, fk_categorie, fk_user) VALUES('".$titre."','".$content."' ,'".$date."', $categorie, $user)");
        return $data;
    }
    function newComment($message,$date,$topicId,$userID){
        $data = sqlDbRequest("INSERT INTO `post` (message, date_creation, fk_topic, fk_user) values ('".$message."','".$date."' , $topicId, $userID)");
        return $data;
    }
    function newUser($nickname,$nom,$prenom,$email,$password,$date_inscription){
        $data = sqlDbRequest("INSERT INTO `user` (nickname,nom,prenom,email,password,date_inscription) values ('".$nickname."','".$nom."','".$prenom."','".$email."','".$password."','".$date_inscription."')");
        return $data;
    }

?>
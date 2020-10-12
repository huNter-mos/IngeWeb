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

    function getFromTable($req){
        $dbh = connect();
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
        $data = getFromTable("SELECT * FROM topic");
        return $data;
    }   

    function getTopicById($id){
        $data = getFromTable("SELECT * FROM topic WHERE id=$id");
        return $data;
    }  

    function getUserById($id){
        $data = getFromTable("SELECT id , nickname , nom , prenom , email , date_inscription , avatar_url FROM user WHERE id=$id");
        return $data;
    }
    function getUserByMail($mail){
        $data = getFromTable("SELECT nickname FROM user WHERE email=$mail");
        return $data;
    }  

    function getCommentByTopic($topicId){
        $data = getFromTable("SELECT * FROM post WHERE fk_topic=$topicId");
        return $data;
    }
    function connectForum($email,$password){
        $data = getFromTable("SELECT COUNT(*) FROM user WHERE email=$email AND password=$password");
        return $data;
    }

?>
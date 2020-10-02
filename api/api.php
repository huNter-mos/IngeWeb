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

    function updateClass($name, $class){
        $dbh = connect();
        $sql = "UPDATE characters SET class = '$class' WHERE name = '$name'";
        $dbh->beginTransaction();
        try {
            $sth = $dbh->prepare($sql);
            $sth->execute();
            $data = $sth->fetchAll();
            $dbh->commit();
        } catch(PDOException $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
            $dbh->rollback();
        }
    }
?>
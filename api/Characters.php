<?php
function create(){
        $sql = file_get_contents("script.sql");
        try {
            $dbh = connect();
            $dbh->exec($sql);
        } catch (PDOException $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
        }
    }

    function connect(){
        $dbh = new PDO('sqlite:database.sqlite');
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

    function getCharactersBase(){
        $data = getFromTable("SELECT id,name FROM characters");
        return $data;
    }   

    function getCharactersOrdered($order){
        $data = getFromTable("SELECT name, tribe FROM characters ORDER BY $order");
        return $data;
    }

    function getCharacterById($id){
        $data = getFromTable("SELECT * FROM characters WHERE id=$id");
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
<?php
   session_start();
   require_once "../api/api.php";

   if (isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])) {
         $db = new PDO("sqlite:".__DIR__."/database.sql");
         $data = file_get_contents("http://bean.example.com/api/index.php?url=connect&email=%22" . $_POST['username'] . "%22&pwd=%22" . $_POST['password'] . "%22");
      if ($data[14]) {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = getUserByEmail();
         $msg =  'You have entered valid use name and password';
         header('Location: ../view/index.php');
      }else {
         //connexion impossible
         header('Location: ../view/login.php');
      }
   
   }

?>
<?php
   session_start();
   require_once "../api/api.php";

   if (isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])) {
         $db = new PDO("sqlite:".__DIR__."/database.sql");
         connectForum($_POST['username'], $_POST['password']);
      if ($response) {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = getUserByEmail();
         $msg =  'You have entered valid use name and password';
      }else {
         //connexion impossible
         header( 'Location: ../view/login.html' );
      }
   
   }

?>
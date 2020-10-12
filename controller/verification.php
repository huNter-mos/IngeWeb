<?php
   session_start();
   require_once "../api/api.php";

   if (isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])) {
         $db = new PDO("sqlite:".__DIR__."/database.sql");
         $data = file_get_contents("http://bean.example.com/api/index.php?url=connect&email=%22" . $_POST['username'] . "%22&pwd=%22" . $_POST['password'] . "%22");
         $response = json_decode($data,true);
      if ($response["COUNT(*)"]) {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $mail = file_get_contents("http://bean.example.com/api/index.php?url=mail&email=%22" . $_POST['username'] . "%22");
         $mail = json_decode($mail,true);
         $_SESSION['username'] = $mail["nickname"];
         $msg =  'You have entered valid use name and password';
         //redirection
         header('Location: ../view/index.php');
      }else {
         //connexion impossible
         header('Location: ../view/login.php');
      }
   
   }

?>
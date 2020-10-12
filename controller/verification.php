<?php
   session_start();
   require_once "../api/api.php";

   if (isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])) {
         $data = file_get_contents("http://bean.example.com/api/index.php?url=connect&email=%22" . $_POST['username'] . "%22&pwd=%22" . $_POST['password'] . "%22");
         $response = json_decode($data,true);
      if ($response["COUNT(*)"]) {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $byMail = file_get_contents("http://bean.example.com/api/index.php?url=mail&email=%22" . $_POST['username'] . "%22");
         $byMail = json_decode($byMail,true);
         $_SESSION['nickname'] = $byMail["nickname"];
         $_SESSION['nom'] = $byMail['nom'];
         $_SESSION['prenom'] = $byMail['prenom'];
         $_SESSION['email'] = $byMail['email'];
         $_SESSION['date_inscription'] = $byMail['date_inscription'];
         $_SESSION['avatar_url'] = $byMail['avatar_url'];

         //redirection
         header('Location: ../view/index.php');
      }else {
         //connexion impossible
         $_SESSION['error'] = true;
         header('Location: ../view/login.php');
      }
   
   }

?>
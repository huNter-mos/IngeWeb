<?php
   include "../api/api.php";

   $msg = 'pas de resultat';
   
   //TODO connexion bdd en PDO et vérification des données du post
   //TODO session etc
   if (isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])) {
   
      if ($_POST['username'] == 'tutorialspoint' && 
         $_POST['password'] == '1234') {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = 'tutorialspoint';
         
         $msg =  'You have entered valid use name and password';
      }else {
         $msg = 'Wrong username or password';
      }
   
   }
echo($msg);

?>
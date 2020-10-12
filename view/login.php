<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Login TripleA</title>
  </head>

  <body>
    <?php
      session_start();
    ?>
    
    <ul class="nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="#forum">Forum</a></li>
        <li><a href="#topic">Topic</a></li>
        <li><a href="#about">About</a></li>
        <li class="profil active"><a href="login.html">Profil</a></li>
    </ul>
    
    <div id="container">
        <!-- zone de connexion -->
        <form action="../controller/verification.php" method="POST">
            <h1>Connexion</h1>
            
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='login' name='login' >
        </form>
    </div>

    <script>
    </script>
  </body>
</html>

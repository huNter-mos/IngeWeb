<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/style.css">

    <title>Forum Triple A</title>
  </head>

  <body>
    <?php
        session_start();
    ?>
      <ul class="nav">
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="about.php">About</a></li>
        <li class="profil">
          <a href="login.php">
            <?php
              if(isset($_SESSION['nickname'])){
                print($_SESSION['nickname']);
              }
              else{
                print("Profil");
              }
            ?>
          </a>
        </li>
      </ul>

      <h1>Bienvenue sur le site, pour accéder aux différents sujets de discussion, merci de rejoindre le forum.</h1>

  </body>
</html>

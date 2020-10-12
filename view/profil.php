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
        if(!isset($_SESSION['nickname'])){
          header('Location: ../view/login.php');
        }
    ?>

    <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="about.php">About</a></li>
        <li class="profil active">
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


    

    <script>
    </script>
  </body>
</html>

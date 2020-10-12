<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../js/scriptTopic.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Forum Triple A</title>
  </head>

  <body>
    <?php
        session_start();
    ?>
      <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="forum.php">Forum</a></li>
        <li><a href="about.php">About</a></li>
        <li class="profil"><a href="login.php">Profil</a></li>
      </ul>

      <div class="topicView" id="topicView">

      </div>
      <div class="commentView" id="commentView">

      </div>

  </body>
</html>
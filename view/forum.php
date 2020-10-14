<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../js/script.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Forum Triple A</title>
  </head>

  <body>
    <?php
        session_start();
    ?>
      <ul class="nav">
        <li><a class="" href="index.php">Home</a></li>
        <li><a class="active" href="forum.php">Forum</a></li>
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

      <div class="topics" id="topics">

      </div>
      <button class="open-button" onclick="openForm()">New Topic</button>

<div class="form-popup" id="myForm">
  <div class="form-container">
    <h1>New Topic</h1>

    <label for="title"><b>Title</b></label>
    <input id="postTitle" type="text" placeholder="Enter Title" name="title" autocomplete="off" required>

    <label for="content"><b>Content</b></label>
    ​<textarea id="postContent" rows="10" cols="35" style="resize: none;"></textarea>

    <?php
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
    }else{
      $id = "x";
    }
    ?>
    
    <button type="submit" onclick="topicForm('<?php echo $id; ?>')" class="btn">Post</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </div>
</div>


  </body>
</html>

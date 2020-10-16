<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../js/script.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Login TripleA</title>
  </head>

  <body>
    <?php
        session_start();
        if(isset($_SESSION['nickname'])){
          header('Location: ../view/profil.php');
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
    
    
    <div id="container">
        <!-- zone de connexion -->
        <form action="../controller/verification.php" method="POST">
            <h1>Connexion</h1>
            <?php
              if(isset($_SESSION['error'])){
                print('<div class="error"> Erreur de connexion</div>');
                unset($_SESSION['error']);
              }
            ?>
            
            <label><b>Email</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='login' name='login' >
        </form>
    </div>
    <button class="open-button" onclick="openForm()">New User</button>

<div class="form-popup" id="myForm">
  <div class="form-container">
    <h1>New User</h1>

    <label for="nicknameUser"><b>Nickname</b></label>
    <input id="nicknameUser" type="text" placeholder="Enter nickname" name="nickname" autocomplete="off" required>

    <label for="prenomUser"><b>First name</b></label>
    <input id="prenomUser" type="text" placeholder="Enter first name" name="prenom" autocomplete="off" required>

    <label for="nomUser"><b>Last name</b></label>
    <input id="nomUser" type="text" placeholder="Enter last name" name="nom" autocomplete="off" required>

    <label for="emailUser"><b>Email</b></label>
    <input id="emailUser" type="text" placeholder="Enter email" name="email" autocomplete="off" required>

    <label for="passwordUser"><b>Password</b></label>
    <input id="passwordUser" type="password" placeholder="Enter password" name="passwordUser" autocomplete="off" required>

    <label for="passwordConfirm"><b>Confirm password</b></label>
    <input id="passwordConfirm" type="password" placeholder="Confirm password" name="passwordConfirm" autocomplete="off" required>

    
    <button type="submit" onclick="userForm()" class="btn">Create</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </div>
</div>

    <script>
    </script>
  </body>
</html>

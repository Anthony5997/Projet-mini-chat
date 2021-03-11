<?php   session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Test NavBar de connexion</title>
</head>
<nav>
    <div class="topnav">
    <a class="" href="index.php">Accueil</a>
    <a class="" href="form-inscription.php">Inscrivez vous</a>
    <br>
    <label class="switch">
      <input type="checkbox">
      <span class="slider round"></span>
    </label>
    <?php  if(empty($_SESSION["connect"])){
    echo '<div class="login-container">
        <form action="process/connexion-process.php" method="post">
            <input type="text" placeholder="username" name="mailVerif">
            <input type="text" placeholder="password" name="passVerif">
        <button type="submit">Connexion</button>
        </form>';
    }else{
        echo "<div class='session-align'>
                <p class="."button-perso".">Salut ". $_SESSION["user"]."</p> 
                <a href="."process/deco.php".">Déconnexion</a>";
                ?>
               
            </div>
   <?php } ?>
    </div>
    </div>
<?php if(isset($_GET["message"])){
        echo '<div style="padding: 10px; width:25vw; background:green; color:#fff;">
                '.$_GET["message"].'
             </div>';
    }
 ?>
 </nav>
<body>

<?php
$ip_user = $_SERVER['REMOTE_ADDR'];
$pseudo = $_POST['pseudo'];
$pwd = $_POST['pwd'];
$pwdConfirm = $_POST['pwd_conf'];
$colorRandom = $_POST['color'];
$salt = "gHk45=)-('$^ùmm";
$pwd_crypte = sha1(sha1($pwd).$salt);

include("../include/sql_connect.php");

$result = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo= :pseudo');
$result->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$result->execute();
$usersConnect = $result->fetch(PDO::FETCH_ASSOC);

    if ($usersConnect){
        if(strtolower($pseudo) == strtolower($usersConnect['pseudo'])){
            header("Location: ../form-inscription.php?message=Le pseudo est déjà utilisé");
        }
    }elseif($pwd != $pwdConfirm){
        header("Location: ../form-inscription.php?message=Les mots de passe ne sont pas identiques");
    }else{
        $result = $bdd->prepare('INSERT INTO users(
            pseudo, pwd, ip, color)
        VALUES(
            ?, ?, ?, ?)');
        $result->execute(array($pseudo, $pwd_crypte, $ip_user, $colorRandom));
        header("Location: ../index.php?message=Nouvel inscrit ! Bienvenue parmis nous.");
}
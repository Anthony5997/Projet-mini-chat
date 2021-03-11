<?php 
session_start();
include("../include/sql_connect.php");
if (isset($_POST['mailVerif']) && !empty($_POST['mailVerif']) && isset($_POST['passVerif']) && !empty($_POST['passVerif'])){
    $pseudoVerif = $_POST['mailVerif'];
    $passVerif = $_POST['passVerif'];
    $salt = "gHk45=)-('$^ùmm";
    $passCrypt = sha1(sha1($passVerif).$salt); 
    $result = $bdd->prepare('SELECT pseudo, pwd, user_type, color FROM users WHERE pseudo= :pseudo');
    $result->bindValue(':pseudo', $pseudoVerif, PDO::PARAM_STR);  
    $result->execute();

    $users = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($users as $user){
        $pseudoBdd = $user['pseudo'];
        $passBdd = $user['pwd'];
        $typeUser = $user['user_type']; 
        $colorUser = $user['color'];      
    }
    if(strtolower($pseudoVerif) == strtolower($pseudoBdd) && $passCrypt == $passBdd) {
            $_SESSION['user'] = $pseudoVerif;
            $_SESSION['pwd'] = $passCrypt;
            $_SESSION['connect'] = 1;
            $_SESSION['status'] = $typeUser;
            $_SESSION['color'] = $colorUser;
            header("Location: ../index.php?message=Connexion réussis.");
    }else{
        header("Location: ../index.php?message=Identifiants ou mot de passe incorrecte.");
    }
}else{
    header("Location: ../index.php?message=Veuiller remplir les champs pour vous.");
}
include("../include/footer.php");
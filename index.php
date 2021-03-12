<?php 
    include("include/sql_connect.php");
    include("include/header.php");
    include("process/function.php");
    if (isset($_POST['message']) && !empty($_POST['message'])){
        $pseudo = $_SESSION['user'];
        $message = removeslashes($_POST['message']);
        $message = htmlentities($message); 
        $result = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $result->execute([
            $pseudo
        ]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $newUser = $bdd->prepare('INSERT INTO users(
                pseudo, ip)
                VALUES(?, ?)');
            $newUser->execute(array($pseudo, $_SERVER['REMOTE_ADDR']));
            insert_message($bdd,$message,$bdd->lastInsertId());
        }else{
            insert_message($bdd,$message,$user['id']);
        }
    }
    ?>
<h2 class="text-center">Chat</h2>
<?php 
if(!empty($_SESSION["connect"]) && $_SESSION["connect"] === 1){
    include("chat.php");
 }else{
     echo '<p class="logPlease">vous devez vous connecter pour participer au chat.</p>';
 } ?>
<?php
include("include/footer.php");
?>
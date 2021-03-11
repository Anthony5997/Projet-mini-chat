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
if(!empty($_SESSION["connect"]) &&$_SESSION["connect"] === 1){ ?>
<div class="container">
    <div class="row">
        <div  id="box-chat" class="col-sm-8 message-section">
            <?php include("display-message.php"); ?>
        </div>
        <div class="col-sm-3 membre-section">
            <?php
                echo "<h3 class='text-center'>Membre</h3>";
                $getPseudo = $bdd->prepare('SELECT pseudo, color FROM users');
                $getPseudo->execute();
                $pseudoUsers = $getPseudo->fetchAll(PDO::FETCH_ASSOC);
                foreach($pseudoUsers as $pseudoUser){?>
                    <span style="color:<?= $pseudoUser['color']?>;">🤢 <?=$pseudoUser['pseudo']?></span><br>
               <?php } ?>
        </div>
    </div>
        <div>
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col-sm-11 form-section">
                        <div class="form-group inputForm">
                            <label for="pseudo">Pseudo:</label> <br>
                            <span style="color:<?=$_SESSION['color']?>;"><?= $_SESSION['user']?></span>
                        </div>
                        <div class="form-group inputForm">
                            <label for="message">Message :</label> <br>
                            <textarea class="textareaZone" id="message" name="message" rows="4" cols="50">
                            </textarea>
                        </div>
                        <div class="form-group inputForm">
                            <button class="btn btn-primary text-center sendMessage" type="submit">Envoyer</button>
                        </div>
                        </div> 
                    </div>
                </div>
            </form>
        </div>
 <?php }else{
     echo '<p class="logPlease">vous devez vous connecter pour participer au chat.</p>';
 } ?>
<?php
include("include/footer.php");
?>
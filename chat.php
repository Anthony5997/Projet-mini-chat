<div class="container">
    <div class="row">
        <div  id="box-chat" class="col-sm-8 message-section">
            <?php include("display-message.php"); ?>
            <div id="typing_on">C'est calme...</div> 
        </div>
        <div class="col-sm-3 membre-section">
            <?php
                echo "<h3 class='text-center'>Membre</h3>";
                $getPseudo = $bdd->prepare('SELECT pseudo, color, user_type FROM users');
                $getPseudo->execute();
                $pseudoUsers = $getPseudo->fetchAll(PDO::FETCH_ASSOC);
                foreach($pseudoUsers as $pseudoUser){?>
                    <span style="color:<?= $pseudoUser['color']?>;">🤢 <?=$pseudoUser['pseudo']?>
                    <?php if($pseudoUser['user_type'] === "admin"){ echo "🤠";}?></span><br>
                    <?php 
                } ?>
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
                            <textarea onkeypress="setTimeout(isTyping(),4000); setInterval(notTyping,6000)" class="textareaZone" id="message" name="message" rows="4" cols="50">
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
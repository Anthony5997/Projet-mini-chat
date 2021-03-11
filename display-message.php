<?php require("include/sql_connect.php"); ?>

    <?php 
        $getMessage = $bdd->prepare('SELECT * FROM users JOIN message_user ON users.id = message_user.id_user ORDER BY message_user.creation_date ASC');
        $getMessage->execute();
        $messageChat = $getMessage->fetchAll(PDO::FETCH_ASSOC);
        foreach($messageChat as $messageUser){ ?>
            <p> <span style="color:<?= $messageUser['color']?>;">🤮 <?=$messageUser['pseudo']?></span><?=" à " . "<i>".$messageUser['creation_date']."</i>". " : " . $messageUser['msg']. "<br>";?></p>
       <?php } ?>
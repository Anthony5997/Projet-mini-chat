<?php 
 require("../include/sql_connect.php"); 
if(isset($_GET["id"])){
    $idMessage = $_GET["id"];
       $query = "DELETE FROM message_user WHERE id=".$idMessage;
       $delMessage = $bdd->prepare($query);
       $delMessage->execute();
       header("Location: ../index.php?message=Message supprimé.");
    }else{
        echo "pas bo";
    }
 ?>
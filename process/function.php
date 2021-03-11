<?php
function insert_message($bdd, $message, $idUser){
    $newMessage = $bdd->prepare('INSERT INTO message_user(
        msg, id_user)
    VALUES(
        ?, ?)');
    $newMessage->execute(array($message, $idUser));
}

function removeslashes($string)
{
    $string=implode("",explode("\\",$string));
    return stripslashes(trim($string));
}

function randomColor(){
    $rgbColor = array();
    foreach(array('r', 'g', 'b') as $color){
    $rgbColor[$color] = rand(0, 255);
}
    $color = "rgb(".implode(",", $rgbColor).")";
    return($color);
}
<?php

$DIRSAVE = $_SERVER['DOCUMENT_ROOT'] . '/api/note/get/';

function genNoteID($num){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz$(!)';
    return substr(str_shuffle($data), 0, $num);
}



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST["note_bg"])){
        $note_bg = $_POST["note_bg"];
    }
    else{exit;}
    if (isset($_POST["note_title"])){
        $note_title = $_POST["note_title"];
    }
    else{exit;}
    if (isset($_POST["note_msg"])){
        $note_msg = $_POST["note_msg"];
    }
    else{exit;}

    // Run After Code if isset all top variables

    $note_id = genNoteID(5);

    $note = array($note_id, $note_title, $note_bg, $note_msg);

    $json_export = json_encode($note);

    $file_export = fopen($DIRSAVE . "$note_id.json", "w");

    fwrite($file_export, $json_export);
    fclose($file_export);

    echo("EXPORTED");

}

?>
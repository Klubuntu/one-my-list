<?php

$DIRSAVE = $_SERVER['DOCUMENT_ROOT'] . '/api/note/get/';

function genNoteID($num){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz$!';
    return substr(str_shuffle($data), 0, $num);
}

    var_dump($_POST["var"]);
    $dump = $_POST["var"];
    for ($x = 0; $x < count($dump); $x++) {
        $tmp[] = $dump[$x];
    }
    $notes = json_encode($tmp, JSON_PRETTY_PRINT);
    $note_id = genNoteID(5);


    $file_export = fopen($DIRSAVE . "$note_id.json", "w");

    fwrite($file_export, $notes);
    fclose($file_export);

    echo("EXPORTED NOTES");
?>
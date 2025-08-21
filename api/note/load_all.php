<?php

$root = $_SERVER['DOCUMENT_ROOT'] . '/api/note/get/';

$string = file_get_contents($root . "Q2LcY.json");

$json_a = json_decode($string, true);
if ($json_a === null) {
    // deal with error...
}

var_dump($json_a);

return $json_a;

?>
<?php

function connecting(){
    $pdo = new PDO('mysql:host=localhost;dbname=gymsys; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

?>
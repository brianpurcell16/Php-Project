<?php

include "functions.php";
include 'projheader1.html';
try { 
$pdo = connecting();
$sql = 'DELETE FROM Member WHERE MemID = :MemID';
$result = $pdo->prepare($sql);
$result->bindValue(':MemID', $_POST['id']); 
$result->execute();
echo "You just deleted customer no: " . $_POST['id'] ." \n click<a href='delete.php'> here</a> to go back ";
} 
catch (PDOException $e) { 
if ($e->getCode() == 23000) {
          echo "ooops couldnt delete as that record is linked to other tables click<a href='deleteFrom.html'> here</a> to go back ";
     }
} ?>

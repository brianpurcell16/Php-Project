<?php

include 'projheader1.html';
include "functions.php";

try{
$pdo = connecting();
$sql = 'UPDATE member set Fname=:cfname, Sname=:csname, Email=:cemail, Phone=:cphone, Wallet=:cwallet WHERE MemID = :cid';
$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_POST['ud_id']);
$result->bindValue(':cfname', $_POST['ud_fname']);
$result->bindValue(':csname', $_POST['ud_sname']);
$result->bindValue(':cemail', $_POST['ud_email']);
$result->bindValue(':cphone', $_POST['ud_phone']);
$result->bindValue(':cwallet', $_POST['ud_wallet']);
$result->execute();


$count = $result->rowCount();
if ($count > 0)
{
echo "You just updated customer whos MemID is " . $_POST['ud_id'] . " Click<a href='selectUpdate.php'> Here</a> to go back";
}
else
{
echo "Nothing Updated";
}
}

catch (PDOException $e){
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}
?>